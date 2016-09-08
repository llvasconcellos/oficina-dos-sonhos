<?php

// global exception handler

function reportExceptions ($code, $descr, $filename, $line)
{
    // obey error_level set by system/user
    if (!($code & error_reporting())) {
		return;
	}
    // lookup table for string names of error codes
	$errortype = array (
					1   =>  "Error",
					2   =>  "Warning",
					4   =>  "Parsing Error",
					8   =>  "Notice",
					16  =>  "Core Error",
					32  =>  "Core Warning",
					64  =>  "Compile Error",
					128 =>  "Compile Warning",
					256 =>  "User Error",
					512 =>  "User Warning",
					1024=>  "User Notice"
					);

	// build a new AMFObject
	$amfout = new AMFObject();
	// init a new error info object
	$error = array();
	// pass the code
	$error["code"] = $code;
	// pass the description
	$error["description"] = $descr;
	// pass the details
	$error["details"] = $filename;
	// pass the level
	$error["level"] = $errortype[$code];
	// pass the line number
	$error["line"] = $line;
	
	if($isset($GLOBALS['_lastMethodCall']))
	{
		//Set this in case E_NOTICE is on
		$GLOBALS['_lastMethodCall'] = "/1";
	}
	
	// add the error object to the body of the AMFObject
	$amfbody = new AMFBody($GLOBALS['_lastMethodCall']."/onStatus", $GLOBALS['_lastMethodCall']);
	$amfbody->setResults($error);
	$amfout->addBody($amfbody);  
	
	// create a new output stream
	$outstream = new AMFOutputStream();
	// create a new serializer
	$serializer = new AMFSerializer($outstream);
	
	// serialize the data
	$serializer->serialize($amfout);

	$data = $outstream->flush();

	// send the correct header
	header('Content-type: application/x-amf');
	// flush the amf data to the client.
	print($data);
	
	// kill the system after we find a single error
	exit;
}

set_error_handler("reportExceptions");

?>