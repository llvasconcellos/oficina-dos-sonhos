<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: DOCMAN_config.class.php,v 1.31 2005/01/25 15:15:38 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_config')) {
    return true;
} else {
    define('_DOCMAN_config', 1);
} 

class DOCMAN_Config {
    /**
    * *
    * 
    * @var string The path to the configuaration file
    */
    var $_path = null;

    /**
    * *
    * 
    * @var string The name of the configuaration class
    */
    var $_name = null;

    /**
    * *
    * 
    * @var object An object of configuration variables
    */
    var $_config = null;

    function DOCMan_Config($name, $path)
    {
        $this->_path = $path;
        $this->_name = $name;
        $this->_loadConfig();
    } 

    /**
    * 
    * @param string $ The name of the variable
    * @return mixed The value of the configuration variable or null if not found
    */
    function getCfg($varname , $default = null)
    {
        if (isset($this->_config->$varname)) {
            return $this->_config->$varname;
        } else {
            if (! is_null($default)) {
                $this->_config->$varname = $default;
            } 
            return $default;
        } 
    } 

    /**
    * 
    * @param string $ The name of the variable
    * @param string $ The new value of the variable
    * @return bool True if succeeded, otherwise false.
    */
    function setCfg($varname, $value, $create = false)
    {
        if ($create || isset($this->_config->$varname)) {
            $this->_config->$varname = $value;
            return true;
        } else {
            return false;
        } 
    } 

    /**
    * Loads the configuration file and creates a new class
    */
    function _loadConfig()
    {
        if (file_exists($this->_path)) {
            require_once($this->_path);
            $this->_config = new $this->_name();
        } else {
            $this->_config = new StdClass();
        } 
    } 

    /**
    * Saves the configuration object
    */
    function saveConfig()
    {
        global $my;

        $config = "<?php\n\n";
        $config .= "if( defined( '_" . $this->_name . "') ) {\n return true;\n } else { \ndefine('_" . $this->_name . "',1); \n }\n";
        $config .= "class " . $this->_name . "\n{\n";
        $config .= "// Last Edit: " . strftime("%a, %Y-%b-%d %R") . "\n";
        $config .= "// Edited by: " . $my->username . "\n";

        $vars = get_object_vars($this->_config);
        foreach($vars as $key => $value) {
            if (is_array($value)) {
                $config .= 'var $' . $key . ' = ' . var_export($value , true) . ";\n" ;
            } else {
                $config .= 'var $' . $key . ' = "' . $value . "\";\n" ;
            } 
        } 

        $config .= "}\n";
        $config .= "?>";

        if ($fp = fopen($this->_path, "w")) {
            fputs($fp, $config, strlen($config));
            fclose ($fp);
            return true;
        } else {
            return false;
        } 
    } 
} 

?>