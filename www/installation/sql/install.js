/**
* @package JoomlaPackInstaller
* @version 2.0
* @copyright Copyright (C) 2008 JoomlaPack Developers. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*
* Client-side scripts for JPI's AJAX methods
*
* JoomlaPack is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

/* *****************************************************************************
 * Timeout detection timer
 ******************************************************************************/
var tElapsed = 0; // Seconds elapsed since timer start
var tStart  = null; // Time the timer started
var timerID = 0;
var ResponseOffset = 0; // Time it takes the server to respond

function UpdateTimer() {
	if(timerID) {
		clearTimeout(timerID);
	}

	if(!tStart)
		tStart   = new Date();

	var   tDate = new Date();
	var   tDiff = tDate.getTime() - tStart.getTime();

	tDate.setTime(tDiff);

	tElapsed = tDate.getMinutes() * 60 + tDate.getSeconds();
	timerID = setTimeout("UpdateTimer()", 1000);

	// Check if more than 60 seconds elapsed; if so, it's dead
	if (tElapsed > (60 + ResponseOffset)) {
		StopTimer();
		alert("AJAX failed to function within 60 seconds. Sorry, this installer can not proceed.");
		document.getElementById("NextButton").style.display = "block";
		document.getElementById("AJAXInfo").style.display = "none";
	}
}

function StartTimer() {
	StopTimer();
	tStart   = new Date();
	timerID  = setTimeout("UpdateTimer()", 1000);
}

function StopTimer() {
   if(timerID) {
	  clearTimeout(timerID);
	  timerID  = 0;
   }

   tStart = null;
}

function do_ping_bench() {
	StartTimer();
	document.getElementById("buttons").style.display = "none";
	x_AJAXPing( do_ping_bench_cb );
}

function do_ping_bench_cb( myRet ) {
	StopTimer();
	ResponseOffset = tElapsed;
	document.getElementById("buttons").style.display = "block";
}

/* *****************************************************************************
 * Database Restoration Functions
 ******************************************************************************/

// Starts execution of DB restoration page
function db_start()
{
	document.getElementById("buttons").style.display = "none";
	do_tick();
}

// Calls the DB restoration engine's tick function
function do_tick()
{
	x_dbtick( do_tick_cb );
}

// Parses the result of tick
function do_tick_cb( myRet )
{
	switch( myRet['status'] )
	{
		case "request":
			x_dbrequest( dbrequest_cb );
			break;
		
		case "continue":
			document.getElementById("messages").style.display = "block";
			document.getElementById("messages").innerHTML = myRet['message'];
			do_tick();
			break;
		
		case "finish":
			do_getDBFinish();
			break;
		
		case "error":
			document.getElementById("error").style.display = "block";
			document.getElementById("error").innerHTML = myRet['message'];
			break;
		
		default:
			alert("I don't know how to handle status code \"" + myRet['status'] + '"');
			break;
	}
}

// Displays a section of the page where the user can enter DB parameters.
function dbrequest_cb( myRet )
{
	document.getElementById("db").innerHTML = myRet;
}

// Submits the db parameters to the script
function do_UpdateParams()
{
	document.getElementById("error").style.display = 'none';

	var myHost = document.getElementById("host").value;
	var myDBName = document.getElementById("dbname").value;
	var myUser = document.getElementById("user").value;
	var myPass = document.getElementById("pass").value;
	var myPrefix = document.getElementById("dbprefix").value;
	
	var myDrop = document.getElementById("drop").value == "on" ? true : false;
	var myBackup = document.getElementById("backup").value == "on" ? true : false;
	var mySkipNonJ = document.getElementById("skipnonj").value == "on" ? true : false;
	
	x_dbupdate( myHost, myDBName, myUser, myPass, myPrefix, myDrop, myBackup, mySkipNonJ, do_UpdateParams_cb );
}

// Parses the result of the update parameters command
function do_UpdateParams_cb( myRet )
{
	if( myRet == '' )
	{
		do_getRestoringMessage()
	} else {
		document.getElementById("error").style.display = 'block';
		document.getElementById("error").innerHTML = myRet;
	}
}

// Requests the db restoration msg
function do_getRestoringMessage()
{
	x_getRestoringMessage( do_getRestoringMessage_cb );
}

// Displays the db restoration msg and starts restoring the db
function do_getRestoringMessage_cb( myRet )
{
	document.getElementById("db").innerHTML = myRet;
	do_tick();
}

// Request the restoration completion message
function do_getDBFinish()
{
	x_getDBFinish( do_getDBFinish_cb );
}

// Displays the restoration completion message
function do_getDBFinish_cb( myRet )
{
	document.getElementById("db").innerHTML = myRet;
	document.getElementById("buttons").style.display = "block";
}

/* *****************************************************************************
 * Configuration Page Functions
 ******************************************************************************/

// Submits the configuration to the script
function applyConfig()
{
	var sitename = document.getElementById("sitename").value;
	var mailfrom = document.getElementById("mailfrom").value;
	var adminpass = document.getElementById("adminpass").value;

	var dirperms = "";
	var fileperms = "";

	var ftp_enable = false;
	var ftp_host = "";
	var ftp_port = 21;
	var ftp_user = "";
	var ftp_pass = "";
	var ftp_root = "";
	
	var digit1 = 0;
	var digit2 = 0;
	var digit3 = 0;

	if( document.getElementById("chmoddir").checked ) {
		digit1 = 0;
		digit2 = 0;
		digit3 = 0;

		digit1 += document.getElementById("dur").checked ? 4 : 0;
		digit2 += document.getElementById("dgr").checked ? 4 : 0;
		digit3 += document.getElementById("dor").checked ? 4 : 0;
		digit1 += document.getElementById("duw").checked ? 2 : 0;
		digit2 += document.getElementById("dgw").checked ? 2 : 0;
		digit3 += document.getElementById("dow").checked ? 2 : 0;
		digit1 += document.getElementById("dux").checked ? 1 : 0;
		digit2 += document.getElementById("dgx").checked ? 1 : 0;
		digit3 += document.getElementById("dox").checked ? 1 : 0;
		
		dirperms = "0" + digit1 + digit2 + digit3;
	}
	
	if( document.getElementById("chmodfiles").checked ) {
		digit1 = 0;
		digit2 = 0;
		digit3 = 0;

		digit1 += document.getElementById("fur").checked ? 4 : 0;
		digit2 += document.getElementById("fgr").checked ? 4 : 0;
		digit3 += document.getElementById("for").checked ? 4 : 0;
		digit1 += document.getElementById("fuw").checked ? 2 : 0;
		digit2 += document.getElementById("fgw").checked ? 2 : 0;
		digit3 += document.getElementById("fow").checked ? 2 : 0;
		digit1 += document.getElementById("fux").checked ? 1 : 0;
		digit2 += document.getElementById("fgx").checked ? 1 : 0;
		digit3 += document.getElementById("fox").checked ? 1 : 0;
		
		fileperms = "0" + digit1 + digit2 + digit3;
	}
	
	if( document.getElementById("ftp") )
	{
		ftp_enable = false;
		ftp_host = "";
		ftp_port = 21;
		ftp_user = "";
		ftp_pass = "";
		ftp_root = "";
	}
	
	document.getElementById("error").style.display = "none";
	x_applyConfig( sitename, mailfrom, adminpass, dirperms, fileperms, ftp_enable, ftp_host, ftp_port, ftp_user, ftp_pass, ftp_root, applyConfig_cb );
}

function applyConfig_cb( myRet )
{
	if( myRet != '' ) {
		document.getElementById("error").style.display = "block";
		document.getElementById("error").innerHTML = myRet;
	} else {
		window.location = 'index.php?task=finish';
	}
}

// Asks for a new random password for the site
function getRandomPassword()
{
	x_getRandPass( getRandomPassword_cb );
}

// Updates the admin password with the randomly generated one
function getRandomPassword_cb( myRet )
{
	document.getElementById("adminpass").value = myRet;
}