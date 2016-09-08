<?php
/**
* @package JoomlaPackInstaller
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @version 2.0
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* A simplistic class to handle loading and saving a Joomla!-compatible configuration.php file
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
defined( '_VALID_MOS' ) or die( 'Restricted access' );

class CJConfigManager {
	var $JoomlaVersion		= "1.0.x";
	var $isConfigLoaded		= false;
	var $config				= array();

	function CJConfigManager(){
		// Sanitize Windows' file paths
		$JPInstallerRoot = JPIDIR;
		$JPInstallerRoot = str_replace("\\", "/", $JPInstallerRoot);

		// Sense the Joomla! version (1.0.x or 1.5)
		$this->_get_JoomlaVer();

		// Try to locate the configuration.php (or default configuration)
		$JoomlaRoot = realpath($JPInstallerRoot . "/..");

		// Try to load the configuration.php
		if (file_exists( $JPInstallerRoot . "/configuration.php" )) {
			$this->_load_configfile( $JPInstallerRoot . "/configuration.php" );
		} elseif (file_exists( $JoomlaRoot . "/configuration.php" )) {
			$this->_load_configfile( $JoomlaRoot . "/configuration.php" );
		} elseif (file_exists( $JPInstallerRoot . "/configuration-" . $this->JoomlaVersion . ".php" )) {
			$this->_load_configfile( $JPInstallerRoot . "/configuration-" . $this->JoomlaVersion . ".php" );
		} else {
			$this->isConfigLoaded = false;
		}
	}

	/**
	* A semi-intelligent way to guess the Joomla! version (1.0.x or 1.5.x). I do NOT use the version stored in
	* the version.php file, because it can be altered by any webmaster, causing this script to fail.
	*/
	function _get_JoomlaVer(){
		// Sanitize Windows' file paths
		$JPInstallerRoot = JPIDIR;
		$JPInstallerRoot = str_replace("\\", "/", $JPInstallerRoot);

		// Find the includes folder
		$JIncludesFolder = realpath($JPInstallerRoot . "/../includes/");

		// The file 'application.php' is present only on J! 1.5 onwards. That was darn simple, I guess :)
		if (!file_exists($JIncludesFolder . "/application.php")) {
			$this->JoomlaVersion = "1.0.x";
		} else {
			$this->JoomlaVersion = "1.5";
		}
	}

	/**
	* Tries to load the configuration.php file from $fileName
	*/
	function _load_configfile( $fileName ){
		// Does the file exists?
		if (!file_exists( $fileName )) {
			$this->isConfigLoaded = false;
		} else {
			require( $fileName ); // FIX: erroneous use of require_once here didn't actually load the config file. Ouch!

			$this->config = array();

			switch($this->JoomlaVersion){
				case "1.0.x":
					$allVars = get_defined_vars();
					foreach($allVars as $varName => $varValue){
						if (stristr($varName, "mosConfig")) {
							$varName = str_replace("mosConfig_", "", $varName);
							$this->config[$varName] = $varValue;
						}

					}
					$this->isConfigLoaded = true;
					break;
				case "1.5":
					$this->config = get_class_vars("JConfig");
					$this->isConfigLoaded = true;
					break;
			} // switch
		}
	}

	/**
	* Returns a configuration.php valid for the currently sensed Joomla! version
	*/
	function ConfigurationContents(){
		switch($this->JoomlaVersion){
			case "1.0.x":
				$out="<?php\n";
				foreach($this->config as $name => $value){
					$out .= '$mosConfig_' . $name . " = '". addslashes($value) ."';\n";
				}

				$out .= 'setlocale (LC_ALL, $mosConfig_locale);' . "\n";
				$out .= "if(!defined('RG_EMULATION')) { define( 'RG_EMULATION', 0 ); }	// Off by default for security\n";
				return $out;
				break;
			case "1.5":
				$out =  "<?php\n";
				$out .= "class JConfig {\n";
				foreach($this->config as $name => $value){
					$out .= "\t" . 'var $' . $name . " = '". addslashes($value) ."';\n";
				}

				$out .= '}' . "\n";
				return $out;
				break;
		} // switch
	}
	
	function save()
	{
		$serialized = serialize( $this );
		$fp = @fopen( JPIDIR . '/cjc.dat', 'w' );
		if ($fp === false) die ('The installation directory is unwritable or unable to create cjc.dat file in it');
		fwrite( $fp , $serialized );
		unset( $serialized );
		fclose( $fp );
	}
}

// Make sure we always have a current copy of CJConfigManager in memory.
global $ConfigManager;
$task = mosGetParam($_REQUEST, 'task', 'index');

switch( $task )
{
	case "index":
		// Force a fresh instance every time the database restoration page is loaded.
		$ConfigManager = new CJConfigManager();
		$ConfigManager->save();
		break;
	default:
		if( file_exists( JPIDIR . '/cjc.dat' ) )
		{
			// If the file exists, load it
			$serializedFunc = file_get_contents( JPIDIR . '/cjc.dat' );
			$ConfigManager = unserialize( $serializedFunc );
		} else {
			// This shouldn't happen!
			die('Could not load cjc.dat; is someone messing with this installer?!');
		}
}

?>