<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: zoom.class.php                                            |
| Version: 2.5.3                                                      |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author TOMO <groove@spencernetwork.org>
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * FTP library class, which is able to make a connection to a remote server with the native PHP ftp module AND
 * through a standard socket. This class is usually used to replace basic filesystem functions when PHP safemode is
 * turned on.
 *
 * @access public
 */
class ftplib extends zoom {

    /**
	 * @var boolean
	 * @access private
	 */
    var $_debug = null;
    /**
	 * @var int
	 * @access private
	 */
    var $_umask = null;
    /**
	 * @var int
	 * @access private
	 */
    var $_timeout = null;
    /**
	 * @var int
	 * @access private
	 */
    var $_BINARY = null;
    /**
	 * @var int
	 * @access private
	 */
    var $_ASCII = null;
    /**
	 * @var ftp_connection
	 * @access private
	 */
    var $_socket = null;
    /**
	 * @var boolean
	 * @access private
	 */
    var $_use_mod_ftp = null;
    
    /**
     * Ftp Library object constructor
     *
     * @return ftplib
     * @access public
     */
    function ftplib()
    {
        $this->_debug = false;
        $this->_umask = 0022;
        $this->_timeout = 30;
        $this->_BINARY = 1;
        $this->_ASCII = 0;
        if (function_exists("ftp_connect")) {
    		$this->_use_mod_ftp = true;
    	} else {
            $this->_use_mod_ftp = false;
    	}
    }
    /**
	 * Connect to a remote ftp server and save the connection.
	 *
	 * @param string $server
	 * @param int $port
	 * @return boolean
	 * @access public
	 */
    function connect($server, $port = 21)
    {
    	$this->debug("Trying to ".$server.":".$port." ...\n");
    	if ($this->_use_mod_ftp) {
    		$this->_socket = ftp_connect($server, $port);
    	} else {
    	   $this->_socket = @fsockopen($server, $port, $errno, $errstr, $this->_timeout);
    	}
    	if ($this->_socket && $this->ok()) {
    		$this->debug("Connected to remote host \"".$server.":".$port."\"\n");
    		return true;
    	} else {
    		$this->debug("Cannot connect to remote host \"".$server.":".$port."\"\n");
    		$this->debug("Error : ".$errstr." (".$errno.")\n");
    		return false;
    	}
    }
    /**
	 * Login to the server with the username and password provided by the user.
	 *
	 * @param string $user
	 * @param string $pass
	 * @return boolean
	 * @access public
	 */
    function login($user, $pass)
    {
        if ($this->_use_mod_ftp) {
    		ftp_login($this->_socket, $user, $pass);
    	} else {
    	   $this->putcmd($this->_socket, "USER", $user);
    	   if (!$this->ok()) {
            return FALSE;
            }
            $this->putcmd($this->_socket, "PASS", $pass);
    	}
    	if ($this->ok()) {
    		$this->debug("Authentication succeeded\n");
    		return TRUE;
    	} else {
    		$this->debug("Error : Authentication failed\n");
    		return FALSE;
    	}
    }
    /**
	 * Execute the PWD commands, typically used to check if the connection is still valid.
	 *
	 * @return boolean
	 * @access public
	 */
    function pwd()
    {
        if ($this->_use_mod_ftp) {
    		$response = ftp_pwd($this->_socket);
    	} else {
        	$this->putcmd("PWD");
        	$response = $this->getresp();
    	}
    	if (!$response) {
    		return FALSE;
    	}
    	if (ereg("^[123]", $response)) {
    		return ereg_replace("^[0-9]{3} \"(.+)\" .+\r\n", "\\1", $response);
    	} else {
    		return FALSE;
    	}
    }
    /**
	 * Request the filesize in bytes of a remote file.
	 *
	 * @param string $pathname
	 * @return int
	 * @access public
	 */
    function size($pathname)
    {
        if ($this->_use_mod_ftp) {
    		$response = ftp_size($this->_socket);
    	} else {
        	$this->putcmd("SIZE", $pathname);
        	$response = $this->getresp();
    	}
    	if (!$response) {
    		return FALSE;
    	}
    	if (ereg("^[123]", $response)) {
    		return ereg_replace("^[0-9]{3} ([0-9]+)\r\n", "\\1", $response);
    	} else {
    		return -1;
    	}
    }
    /**
	 * Request the timestamp of a remote file.
	 *
	 * @param string $pathname
	 * @return datetime
	 * @access public
	 */
    function mdtm($pathname)
    {
        if ($this->_use_mod_ftp) {
    		$response = ftp_mdtm($this->_socket, $pathname);
    	} else {
        	$this->putcmd("MDTM", $pathname);
        	$response = $this->getresp();
    	}
    	if (!$response) {
    		return FALSE;
    	}
    	if (ereg("^[123]", $response)) {
    		$mdtm = ereg_replace("^[0-9]{3} ([0-9]+)\r\n", "\\1", $response);
    		list ($year, $mon, $day, $hour, $min, $sec) = sscanf($mdtm, "%4d%2d%2d%2d%2d%2d");
    		$timestamp = mktime($hour, $min, $sec, $mon, $day, $year);
    		return $timestamp;
    	} else {
    		return -1;
    	}
    }
    /**
	 * Request the system type of the remote ftp server.
	 *
	 * @return string
	 * @access public
	 */
    function systype()
    {
        if ($this->_use_mod_ftp) {
    		$data = ftp_systype($this->_socket);
    	} else {
        	$this->putcmd("SYST");
        	$data = $this->getresp();
    	}
    	if ($data) {
    		$DATA = explode(" ", $data);
    		return $DATA[1];
    	} else {
    		return FALSE;
    	}
    }
    /**
	 * Up one directory on the remote director map.
	 *
	 * @return boolean
	 * @access public
	 */
    function cdup()
    {
        if ($this->_use_mod_ftp) {
    		ftp_cdup($this->_socket);
    	} else {
    	   $this->putcmd("CDUP");
    	}
    	return $this->ok();
    }
    /**
	 * Change to a different directory on the remote server.
	 *
	 * @param string $dir
	 * @return boolean
	 * @access public
	 */
    function chdir($dir)
    {
        if ($this->_use_mod_ftp) {
    		ftp_chdir($this->_socket, $dir);
    	} else {
    	   $this->putcmd("CWD", $dir);
    	}
    	return $this->ok();
    }
    /**
	 * Delete (or move to the trashcan) a file from the remote server.
	 *
	 * @param string $pathname
	 * @return boolean
	 * @access public
	 */
    function delete($pathname)
    {
        if ($this->_use_mod_ftp) {
    		ftp_delete($this->_socket, $pathname);
    	} else {
    	   $this->putcmd("DELE", $pathname);
    	}
    	return $this->ok();
    }
    /**
	 * Delete (or move to the trashcan) a complete directory from the remote server.
	 *
	 * @param int $id
	 * @return boolean
	 * @access public
	 */
    function rmdir($pathname)
    {
        if ($this->_use_mod_ftp) {
    		ftp_rmdir($this->_socket, $pathname);
    	} else {
        	$this->putcmd("RMD", $pathname);
    	}
    	return $this->ok();
    }
    /**
	 * Create a new directory on the remote server.
	 *
	 * @param string $pathname
	 * @return boolean
	 * @access public
	 */
    function mkdir($pathname)
    {
        if ($this->_use_mod_ftp) {
    		ftp_mkdir($this->_socket, $pathname);
    	} else {
    	   $this->putcmd("MKD", $pathname);
    	}
    	return $this->ok();
    }
    /**
	 * Rename a file on the remote server.
	 *
	 * @param string $from
	 * @param string $to
	 * @return boolean
	 * @access public
	 */
    function rename($from, $to)
    {
    	if (!$this->file_exists($from)) {
    		$this->debug("Error : No such file or directory \"".$from."\"\n");
    		return FALSE;
    	}
    	if ($this->_use_mod_ftp) {
    		ftp_rename($this->_socket, $from, $to);
    	} else {
        	$this->putcmd("RNFR", $from);
        	
        	if (!$this->ok()) {
        		return FALSE;
        	}
        	
        	$this->putcmd("RNTO", $to);
    	}
    	return $this->ok();
    }
    /**
	 * Parse a directory on the remote server and return a list of item residing there.
	 *
	 * @param string $arg
	 * @param string $pathname
	 * @return boolean
	 * @access public
	 */
    function nlist($arg = "", $pathname = "")
    {
        if ($this->_use_mod_ftp) {
    		$list = ftp_nlist($this->_socket, $pathname);
    	} else {
        	$this->putcmd("PASV");
        	$string = $this->getresp();
        	
        	if ($arg == "") {
        		$nlst = "NLST";
        	} else {
        		$nlst = "NLST ".$arg;
        	}
        	$this->putcmd($nlst, $pathname);
        	
        	$sock_data = $this->open_data_connection($string);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if ($this->ok()) {
        		$this->debug("Connected to remote host\n");
        	} else {
        		$this->debug("Cannot connect to remote host\n");
        		return FALSE;
        	}
        	
        	while (!feof($sock_data)) {
        		$list[] = ereg_replace("[\r\n]", "", fgets($sock_data, 512));
        	}
        	$this->close_data_connection($sock_data);
        	$this->debug(implode("\n", $list));
    	}
    	if ($this->ok()) {
    		return $list;
    	} else {
    		return FALSE;
    	}
    }
    /**
	 * Retrieve a directory listing in binary format.
	 *
	 * @param string $pathname
	 * @return boolean
	 * @access public
	 */
    function rawlist($pathname = "")
    {
        if ($this->_use_mod_ftp) {
    		ftp_rawlist($this->_socket, $pathname);
    	} else {
        	$this->putcmd("PASV");
        	$response = $this->getresp();
        	
        	$this->putcmd("LIST", $pathname);
        	
        	$sock_data = $this->open_data_connection($response);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if ($this->ok()) {
        		$this->debug("Connected to remote host\n");
        	} else {
        		$this->debug("Cannot connect to remote host\n");
        		return FALSE;
        	}
        	
        	while (!feof($sock_data)) {
        		$list[] = ereg_replace("[\r\n]", "", fgets($sock_data, 512));
        	}
        	$this->debug(implode("\n", $list));
        	$this->close_data_connection($sock_data);
    	}
    	if ($this->ok()) {
    		return $list;
    	} else {
    		return FALSE;
    	}
    }
    /**
	 * Download a file from the remote server to a local destination (in binary OR ASCII mode).
	 *
	 * @param string $localfile
	 * @param string $remotefile
	 * @param int $mode
	 * @return boolean
	 * @access public
	 */
    function get($localfile, $remotefile, $mode = 1)
    {
        if ($this->_use_mod_ftp) {
    		ftp_get($this->_socket, $localfile, $remotefile, $mode);
    	} else {
        	if ($mode) {
        		$type = "I";
        	} else {
        		$type = "A";
        	}
        	
        	if (!$this->file_exists($remotefile)) {
        		$this->debug("Error : No such file or directory \"".$remotefile."\"\n");
        		$this->debug("Error : GET failed\n");
        		return FALSE;
        	}
        	
        	if (@file_exists($localfile)) {
        		$this->debug("Warning : local file will be overwritten\n");
        	} else {
        		umask($this->_umask);
        	}
        	
        	$fp = @fopen($localfile, "w");
        	if (!$fp) {
        		$this->debug("Error : Cannot create \"".$localfile."\"");
        		$this->debug("Error : GET failed\n");
        		return FALSE;
        	}
        	
        	$this->putcmd("PASV");
        	$string = $this->getresp();
        	
        	$this->putcmd("TYPE", $type);
        	$this->getresp();
        	
        	$this->putcmd("RETR", $remotefile);
        	
        	$sock_data = $this->open_data_connection($string);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if ($this->ok()) {
        		$this->debug("Connected to remote host\n");
        	} else {
        		$this->debug("Cannot connect to remote host\n");
        		$this->debug("Error : GET failed\n");
        		return FALSE;
        	}
        	
        	$this->debug("Retrieving remote file \"".$remotefile."\" to local file \"".$localfile."\"\n");
        	while (!feof($sock_data)) {
        		fputs($fp, fread($sock_data, 4096));
        	}
        	fclose($fp);
        	
        	$this->close_data_connection($sock_data);
    	}
    	return $this->ok();
    }
    /**
	 * Download a datastream to a filehandler that is able to write the file afterwards (in binary OR ASCII mode).
	 *
	 * @param filehandler $fp
	 * @param string $remotefile
	 * @param int $mode
	 * @return boolean
	 * @access public
	 */
    function fget($fp, $remotefile, $mode = 1)
    {
        if ($this->_use_mod_ftp) {
    		ftp_fget($this->_socket, $fp, $remotefile, $mode);
    	} else {
        	if ($mode) {
        		$type = "I";
        	} else {
        		$type = "A";
        	}
        	
        	if (!$this->file_exists($remotefile)) {
        		$this->debug("Error : No such file or directory \"".$remotefile."\"\n");
        		$this->debug("Error : GET failed\n");
        		return FALSE;
        	}
        	
        	$this->putcmd("PASV");
        	$string = $this->getresp();
        	
        	$this->putcmd("TYPE", $type);
        	$this->getresp();
        	
        	$this->putcmd("RETR", $remotefile);
        	
        	$sock_data = $this->open_data_connection($string);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if (ftp_ok()) {
        		ftp_debug("Connected to remote host\n");
        	} else {
        		ftp_debug("Cannot connect to remote host\n");
        		ftp_debug("Error : GET failed\n");
        		return FALSE;
        	}
        	
        	$this->debug("Retrieving remote file \"".$remotefile."\" to local file \"".$localfile."\"\n");
        	while (!feof($sock_data)) {
        		fputs($fp, fread($sock_data, 4096));
        	}
        	
        	$this->close_data_connection($sock_data);
    	}
    	return ftp_ok();
    }
    /**
	 * Upload a local file to a remote location on the server (in binary OR ASCII mode).
	 *
	 * @param string $remotefile
	 * @param string $localfile
	 * @param int $mode
	 * @return boolean
	 * @access public
	 */
    function put($remotefile, $localfile, $mode = 1)
    {
        if ($this->_use_mod_ftp) {
    		ftp_put($this->_socket, $remotefile, $localfile, $mode);
    	} else {
        	if ($mode) {
        		$type = "I";
        	} else {
        		$type = "A";
        	}
        	
        	if (!file_exists($localfile)) {
        		$this->debug("Error : No such file or directory \"".$localfile."\"\n");
        		$this->debug("Error : PUT failed\n");
        		return FALSE;
        	}
        	
        	$fp = @fopen($localfile, "r");
        	if (!$fp) {
        		$this->debug("Cannot read file \"".$localfile."\"\n");
        		$this->debug("Error : PUT failed\n");
        		return FALSE;
        	}
        	
        	$this->putcmd("PASV");
        	$string = $this->getresp();
        	
        	$this->putcmd("TYPE", $type);
        	$this->getresp();
        	
        	if ($this->file_exists($remotefile)) {
        		$this->debug("Warning : Remote file will be overwritten\n");
        	}
        	
        	$this->putcmd("STOR", $remotefile);
        	
        	$sock_data = $this->open_data_connection($string);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if ($this->ok()) {
        		$this->debug("Connected to remote host\n");
        	} else {
        		$this->debug("Cannot connect to remote host\n");
        		$this->debug("Error : PUT failed\n");
        		return FALSE;
        	}
        	
        	$this->debug("Storing local file \"".$localfile."\" to remote file \"".$remotefile."\"\n");
        	while (!feof($fp)) {
        		fputs($sock_data, fread($fp, 4096));
        	}
        	fclose($fp);
        	
        	$this->close_data_connection($sock_data);
    	}
    	return $this->ok();
    }
    /**
	 * Upload a local stream to a remote file on the server (in binary or ASCII mode).
	 *
	 * @param string $remotefile
	 * @param filehandler $fp
	 * @param int $mode
	 * @return boolean
	 * @access public
	 */
    function fput($remotefile, $fp, $mode = 1)
    {
        if ($this->_use_mod_ftp) {
    		ftp_fput($this->_socket, $remotefile, $fp, $mode);
    	} else {
        	if ($mode) {
        		$type = "I";
        	} else {
        		$type = "A";
        	}
        	
        	$this->putcmd("PASV");
        	$string = $this->getresp();
        	
        	$this->putcmd("TYPE", $type);
        	$this->getresp();
        	
        	if ($this->file_exists($remotefile)) {
        		$this->debug("Warning : Remote file will be overwritten\n");
        	}
        	
        	$this->putcmd("STOR", $remotefile);
        	
        	$sock_data = $this->open_data_connection($string);
        	if (!$sock_data) {
        		return FALSE;
        	}
        	if ($this->ok()) {
        		ftp_debug("Connected to remote host\n");
        	} else {
        		$this->debug("Cannot connect to remote host\n");
        		$this->debug("Error : PUT failed\n");
        		return FALSE;
        	}
        	
        	$this->debug("Storing local file \"".$localfile."\" to remote file \"".$remotefile."\"\n");
        	while (!feof($fp)) {
        		fputs($sock_data, fread($fp, 4096));
        	}
        	
        	$this->close_data_connection($sock_data);
    	}
    	return $this->ok();
    }
    /**
	 * Execute an arbitrary, server system specific ftp command (like 'CHMOD') on the remote server.
	 *
	 * @param string $command
	 * @return boolean
	 * @access public
	 */
    function site($command)
    {
        if ($this->_use_mod_ftp) {
    		ftp_site($this->_socket, $command);
    	} else {
    	   $this->putcmd("SITE", $command);
    	}
    	return $this->ok();
    }
    /**
	 * Close the connection of this instance.
	 *
	 * @return boolean
	 * @access public
	 */
    function quit()
    {
        if ($this->_use_mod_ftp) {
    		ftp_quit($this->_socket);
    	} else {
    	   $this->putcmd($this->_socket, "QUIT");
    	   fclose($this->_socket);
    	}
    	if ($this->ok()) {
    		$this->debug("Disconnected from remote host\n");
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }
    
    /* Private Functions */
    /**
	 * Execute an arbritary command.
	 *
	 * @param string $cmd
	 * @param $string $arg
	 * @return boolean
	 * @access public
	 */
    function putcmd($cmd, $arg = "")
    {
    	if (!$this->_socket) {
    		return FALSE;
    	}
    	
    	if ($arg != "") {
    		$cmd = $cmd." ".$arg;
    	}
    	
    	fputs($this->_socket, $cmd."\r\n");
    	$this->debug("> ".$cmd."\n");
    	
    	return TRUE;
    }
    /**
	 * Get the resonse output of the previously executed FTP command
	 *
	 * @return boolean
	 * @access public
	 */
    function getresp()
    {
    	if (!$this->_socket) {
    		return FALSE;
    	}
    	
    	$response = "";
    	do {
    		$res = fgets($this->_socket, 512);
    		$response .= $res;
    	} while (substr($res, 3, 1) != " ");
    	
    	$this->debug(str_replace("\r\n", "\n", $response));
    	
    	return $response;
    }
    /**
	 * Check if the connection still exists (i.e. hasn't timed-out) and is responding ok.
	 *
	 * @return boolean
	 * @access public
	 */
    function ok()
    {
    	if (!$this->_socket) {
    		return FALSE;
    	}
    	if (!$this->_use_mod_ftp) {
    		$response = $this->getresp($this->_socket);
        	if (ereg("^[123]", $response)) {
        		return TRUE;
        	} else {
        		return FALSE;
        	}
    	} else {
    	    return true;
    	}
    }
    /**
	 * Check if a remote file exists on the ftp server.
	 *
	 * @param string $pathname
	 * @return boolean
	 * @access public
	 */
    function file_exists($pathname)
    {
        if ($this->_use_mod_ftp) {
    		ftp_mdtm($this->_socket, $pathname);
    	} else {
        	if (!$this->_socket) {
        		return FALSE;
        	}
        	
        	$this->putcmd($this->_socket, "MDTM", $pathname);
    	}
    	if (ftp_ok()) {
    		$this->debug("Remote file ".$pathname." exists\n");
    		return TRUE;
    	} else {
    		$this->debug("Remote file ".$pathname." does not exist\n");
    		return FALSE;
    	}
    }
    /**
	 * Close a raw data connection.
	 *
	 * @param socket $sock_data
	 * @return boolean
	 * @access public
	 */
    function close_data_connection($sock_data)
    {
    	$this->debug("Disconnected from remote host\n");
    	return fclose($sock_data);
    }
    /**
	 * Open a new raw data connection to a ftp server.
	 *
	 * @param string $string
	 * @return boolean
	 * @access public
	 */
    function open_data_connection($string)
    {
    	$data = ereg_replace("^.*\\(([0-9]+,[0-9]+,[0-9]+,[0-9]+,[0-9]+,[0-9]+)\\).*$", "\\1", $string);
    	$DATA = explode(",", $data);
    	$ipaddr = $DATA[0].".".$DATA[1].".".$DATA[2].".".$DATA[3];
    	$port = $DATA[4]*256 + $DATA[5];
    	$data_connection = @fsockopen($ipaddr, $port);
    	if ($data_connection) {
    		$this->debug("Trying to ".$ipaddr.":".$port." ...\n");
    		return $data_connection;
    	} else {
    		$this->debug("Error : Cannot open data connection to ".$ipaddr.":".$port."\n");
    		$this->debug("Error : ".$errstr." (".$errno.")\n");
    		return FALSE;
    	}
    }
    /**
	 * If debugging is set, return the error message on-screen, else exit gracefully.
	 *
	 * @param int $id
	 * @return boolean
	 * @access public
	 */
    function debug($message = "")
    {
    	if ($this->_debug) {
    		echo $message;
    	}
    	
    	return TRUE;
    }
}
?>