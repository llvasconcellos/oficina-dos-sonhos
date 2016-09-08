<?php
class VerboseException extends Exception
{
	public $description;
	public $level;
	public $file;
	public $line;
	public $code;
	
	function VerboseException($string, $level, $file, $line)
	{
		$this->description = $string;
		$this->level = $level;
		$this->code = $level;
		$this->file = $file;
		$this->line = $line;
		Exception::__construct($string);
	}
}

function amfErrorHandler($level, $string, $file, $line, $context)
{
	//forget about errors not defined at reported
	if( defined('AMFPHP_ERROR_LEVEL') && ((AMFPHP_ERROR_LEVEL >> log($level,2)) % 2 == 1))
	{
    	throw new VerboseException($string, $level, $file, $line);
    }
}
set_error_handler("amfErrorHandler");
?>