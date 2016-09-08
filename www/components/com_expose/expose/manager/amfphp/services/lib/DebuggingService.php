<?php
define("APACHE_LOG", "C:/Program Files/Apache Group/Apache/logs/error.log");
define("NUM_LINES", 10);
class DebuggingService
{
	function DebuggingService()
	{
		$this->methodTable = array(
			"getLastError" => array(
				"description" => "Gets last XX lines from Apache error log file",
				"access" => "remote"
			)
		);
	}
	
	function getLastError()
	{
		$lines = file(APACHE_LOG);
		$str = "";
		$max = min(NUM_LINES, count($lines));
		for($i = 0; $i < $max; $i++)
		{
			$str .= $lines[count($lines) - 1 - $i];
		}
		return $str;
	}
}
?>