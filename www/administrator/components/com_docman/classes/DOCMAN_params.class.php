<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: DOCMAN_params.class.php,v 1.3 2005/08/06 13:10:12 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_PARAMS')) {
    return true;
} else {
    define('_DOCMAN_PARAMS', 1);
}

global $mosConfig_absolute_path;
require_once( $mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php' ); 

/**
* Parameters handler
* @package DOCMan_1.3.0
*/
class dmParameters extends mosParameters
{
	/**
	* Constructor
	* @param string The raw parms text
	* @param string Path to the xml setup file
	* @var string The type of setup file
	*/
	function dmParameters( $text, $path='', $type='component' ) {
		parent::mosParameters($text, $path, $type);
	}
	
	
	
	/**
	* @param string The name of the default text area is a setup file is not found
	* @return string HTML
	*/
	function render( $name='params', $method='Standard' ) 
	{
		if ($this->_path) 
		{
		  	if (!is_object( $this->_xmlElem )) 
		  	{
				$xmlDoc =& new DOMIT_Lite_Document();
				$xmlDoc->resolveErrors( true );
				if ($xmlDoc->loadXML( $this->_path, false, true )) 
				{
					$element =& $xmlDoc->documentElement;

					if ($element->getTagName() == 'mosinstall' && $element->getAttribute( "type" ) == $this->_type) {
						if ($element = &$xmlDoc->getElementsByPath( 'params', 1 )) {
							$this->_xmlElem =& $element;
						}
					}
				}
			}
		}

		if (is_object( $this->_xmlElem )) {
			return call_user_func( array( $this, '_render'. $method), $this->_xmlElem, $name );
		} else {
			return "<textarea name=\"$name\" cols=\"40\" rows=\"10\" class=\"text_area\">$this->_raw</textarea>";
		}
	}
	
	function _renderStandard(&$element, $name)
	{
		$html = array();
		$html[] = '<table class="paramlist">';

		if ($description = $element->getAttribute( 'description' )) {
			// add the params description to the display
			$html[] = '<tr><td colspan="3">' . $description . '</td></tr>';
		}

		//$params = mosParseParams( $row->params );
		$this->_methods = get_class_methods( $this );

		foreach ($element->childNodes as $param) 
		{
			$result = $this->renderParam( $param, $name );
			$type = $param->getAttribute( 'type' );
				
			$html[] = '<tr>';
				
			if($type == 'heading') {
				$html[] = '<td  class="title" colspan="3">' . $result[0] . '</td>';
			} else { 
				$html[] = '<td width="50%" align="right" valign="top">' . $result[0] . '</td>';
				$html[] = '<td>' . $result[1] . '</td>';
				$html[] = '<td width="100%" align="left" valign="top">' . $result[2] . "</td>";
			}
				
			$html[] = '</tr>';
		}
		$html[] = '</table>';

		if (count( $element->childNodes ) < 1) {
			$html[] = "<tr><td colspan=\"2\"><i>" . _NO_PARAMS . "</i></td></tr>";
		}
		
		return implode( "\n", $html );
	}
	
	function _renderTableless(&$element, $name)
	{
		$html = array();

		if ($description = $element->getAttribute( 'description' )) {
			// add the params description to the display
			$html[] = '<div>' . $description . '</div>>';
		}

		//$params = mosParseParams( $row->params );
		$this->_methods = get_class_methods( $this );

		foreach ($element->childNodes as $param) 
		{
			$result = $this->renderParam( $param, $name );
			$type = $param->getAttribute( 'type' );
						
			if($type == 'heading') {
				$html[] = '<p><h3>' . $result[0] . '</h3></p>';
			} else { 
				$html[] = '<p>';
				$html[] = '   <label>' . $result[0] . '</label><br />';
				$html[] = '	  '.$result[1];
				$html[] = '   '.$result[2];
				$html[] = '</p>';
			}
		}

		if (count( $element->childNodes ) < 1) {
			$html[] = "<p><i>" . _NO_PARAMS . "</i></p>";
		}
		return implode( "\n", $html );
	}
	
	
	/**
	* @param object A param tag node
	* @return array Any array of the label, the form element and the tooltip
	*/
	function renderParam( &$param, $control_name='params' ) 
	{
	    $result = array();

		$name = $param->getAttribute( 'name' );
		$label = $param->getAttribute( 'label' );

		$value = $this->get( $name, $param->getAttribute( 'default' ) );
		$description = $param->getAttribute( 'description' );

		$result[0] = $label ? $label : $name;
		if ( $result[0] == '@spacer' ) {
			$result[0] = '<hr/>';
		} else if ( $result[0] ) {
			$result[0] .= ':';
		}

		$type = $param->getAttribute( 'type' );

		if (in_array( '_form_' . $type, $this->_methods )) {
			$result[1] = call_user_func( array( $this,'_form_' . $type), $name, $value, $param, $control_name );
		} else {
		    $result[1] = _HANDLER . ' = ' . $type;
		}

		if ( $description ) {
			$result[2] = mosToolTip( $description, $name );
		} else {
			$result[2] = '';
		}

		return $result;
	}
	
	/**
 	* @return string
 	*/
	function toString() {
		$array = $this->toArray();
		$txt = array();
		foreach ($array as $k=>$v) {
			$txt[] = "$k=$v";
		}
		return implode( "\n", $txt );
	}
	
	/**
 	* @return array
 	*/
	function toArray() {
		$retarray = null;
		if (is_object( $this->_params )) {
			$retarray = array();

			foreach (get_object_vars( $this->_params ) as $k => $v) {
				 $retarray[$k] = $v;
			}
		}
		return $retarray;
	}
	
	/**
	* @var string The name of the form element
	* @var string The value of the element
	* @var object The xml element for the parameter
	* @return string The html for the element
	*/
	function _form_heading( $name, $value, &$node, $control_name ) {
		return '';
	}
}

?>
