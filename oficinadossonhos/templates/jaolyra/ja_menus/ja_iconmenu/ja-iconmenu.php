<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
if (!defined ('_JA_ICON_MENU_CLASS')) {
	define ('_JA_ICON_MENU_CLASS', 1);

class IconMenu{
	var $parent = null;
	function IconMenu(&$parent){
		$this->parent = $parent;
	}
	function getParam($paramName){
		return $this->parent->_params->get($paramName);
	}
	function beginMenu(){		
		if ($this->getParam('level') == 0) {
		?>		
		<script language="javascript" type="text/javascript" src="<?php echo $this->getParam('LSPath');?>/ja.iconmenu.js"></script>
		<script language="javascript" type="text/javascript">
		/* <![CDATA[ */
			icon_big = <?php echo $this->getParam('icon_big');?>;
			icon_small = <?php echo $this->getParam('icon_small');?>;
			anim_int = <?php echo $this->getParam('anim_int');?>;
			anim_change = <?php echo $this->getParam('anim_change');?>;
			menu_height = <?php echo $this->getParam('menu_height');?>;
			icon_padding = <?php echo $this->getParam('icon_padding');?>;
		/* ]]> */
		</script>
		<div id="ja-iconmenu">
		<div id="ja-imageTitle"></div>
		<table cellspacing="0" cellpadding="0" border="0"><tr><td style="width:1px"><img src="images/blank.png" style="width:1px;height:<?php echo $this->getParam('menu_height');?>px" alt="" /></td>
		<?php
		} else {
			echo "<div id=\"menuicon-sub\"><ul>\n";
		}
	}
	function endMenu(){
		if ($this->getParam('level') == 0) {
			echo "\n\n</tr></table></div>";
		} else {
			echo "\n\n</ul></div>";
		}
	}
	function genMenuItem(&$row, $level, $pos){

		global $Itemid, $mosConfig_live_site, $mainframe;
		$txt = '';

		switch ($row->type) {
			case 'separator':
			case 'component_item_link':
				break;
				
			case 'url':
				if ( eregi( 'index.php\?', $row->link ) ) {
					if ( !eregi( 'Itemid=', $row->link ) ) {
						$row->link .= '&Itemid='. $row->id;
					}
				}
				break;
				
			case 'content_item_link':
			case 'content_typed':
				// load menu params
				$menuparams = new mosParameters( $row->params, $mainframe->getPath( 'menu_xml', $row->type ), 'menu' );
				
				$unique_itemid = $menuparams->get( 'unique_itemid', 1 );
				
				if ( $unique_itemid ) {
					$row->link .= '&Itemid='. $row->id;
				} else {
					$temp = split('&task=view&id=', $row->link);
					
					if ( $row->type == 'content_typed' ) {
						$row->link .= '&Itemid='. $mainframe->getItemid($temp[1], 1, 0);
					} else {
						$row->link .= '&Itemid='. $mainframe->getItemid($temp[1], 0, 1);
					}
				}
				break;

			default:
				$row->link .= '&Itemid='. $row->id;
				break;
		}

		$row->link = ampReplace( $row->link );

		if ( strcasecmp( substr( $row->link,0,4 ), 'http' ) ) {
			$row->link = sefRelToAbs( $row->link );
		}
		$active = in_array($row->id, $this->parent->open) ? "class = \"active\"" : "";
		
		$id = 'id="menu'.$row->id.'"';
		$mouseaction = "";
		$txt = '<span>'.$row->name.'</span>';
		if ( $this->getParam('level')==0) {
			$menu_params = new stdClass();
			$menu_params =& new mosParameters( $row->params );
			$menu_image = $menu_params->def( 'menu_image', -1 );
			if ( ( $menu_image <> '-1' ) && $menu_image ) {
				$mouseaction = ' onmouseover="iconmenu_over(\''.($pos+1).'\')" onmouseout="iconmenu_out(\''.($pos+1).'\')"';
				$clsactive = $active ? " class=\"active\"":"";
				//$txt = '<img src="'. $mosConfig_live_site .'/images/stories/'. $menu_image .'" border="0" alt="'. $row->name .'" onmouseover="iconmenu_over(\''.($pos+1).'\')" onmouseout="iconmenu_out(\''.($pos+1).'\')" width=\''.$this->getParam('icon_small').'\' height=\''.$this->getParam('icon_small').'\''.$clsactive.' />';
				$msie='/msie\s(5\.[5-9]|[6]\.[0-9]*).*(win)/i';
				
				if( !isset($_SERVER['HTTP_USER_AGENT']) ||
					!preg_match($msie,$_SERVER['HTTP_USER_AGENT']) ||
					preg_match('/opera/i',$_SERVER['HTTP_USER_AGENT'])) {
					$txt = '<img src="images/stories/'. $menu_image .'" border="0" hspace="0" vspace="0" alt="'. $row->name .'"'.$clsactive.' style="width: '.$this->getParam('icon_small').'px; height: '.$this->getParam('icon_small').'px;" />';

				} else {
					$txt = '<img src="images/blank.png" border="0" hspace="0" vspace="0" alt="'. $row->name .'"'.$clsactive.' style="width: '.$this->getParam('icon_small').'px; height: '.$this->getParam('icon_small').'px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'images/stories/'. $menu_image .'\', sizingMethod=scale);" />';

				}
			} else {
				$txt .= '<img src="images/blank.png" border="0" alt="'. $row->name .'" width=\'1\' height=\'1\' />';
			}
		}
		$title = " title=\"{$row->name}\"";
		
		if ($active) $active = ($row->parent == 0 && $pos == 0) ? "class=\"active-first-item\"" : "class = \"active\"";
		else $active = ($row->parent == 0 && $pos == 0) ? "class=\"first-item\"" : "";
		
		switch ($row->browserNav) {
			// cases are slightly different
			case 1:
			// open in a new window
			$txt = '<a href="'. $row->link .'" target="_blank" '.$active.' '. $id .$title.'>'. $txt .'</a>';
			break;

			case 2:
			// open in a popup window
			$txt = "<a href=\"#\" onclick=\"javascript: window.open('". $row->link ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\"  ".$active." ". $id .$title.">". $txt ."</a>\n";
			break;

			case 3:
			// don't link it
			$txt = '<a href="#" '.$active.' '. $id .$title.'>'. $txt .'</a>';
			break;

			default:	// formerly case 2
			// open in parent window
			$txt = '<a href="'. $row->link .'" '.$active.' '. $id .$title.'>'. $txt .'</a>';
			break;
		}

		echo "<td valign=\"bottom\"><span style=\"display:block;padding: 0 ".$this->getParam('icon_padding')."px;cursor:pointer;\"".$mouseaction.">".$txt."</span></td>\n";
	}
}
}
?>
