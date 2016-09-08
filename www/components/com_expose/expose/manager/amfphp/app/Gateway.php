<?php
/**
 * THIS SOFTWARE IS PROVIDED "AS IS" AND ANY EXPRESSED OR IMPLIED WARRANTIES, INCLUDING,
 * BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
 * PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright (c) 2003 amfphp.org
 * @package flashservices
 * @subpackage app
 */

/**
 * AMFPHP_BASE is the location of the flashservices folder in the files system.  It is used as the absolute path
 * to load all other required system classes.
 */
define("AMFPHP_BASE", realpath(dirname(dirname(__FILE__))) . "/");

/**
 * required classes for the application
 */
require_once(AMFPHP_BASE . "app/Constants.php");
require_once(AMFPHP_BASE . "util/AMFObject.php");
require_once(AMFPHP_BASE . "util/AMFLogger.php");
require_once(AMFPHP_BASE . "util/CharsetHandler.php");
require_once(AMFPHP_BASE . "util/NetDebug.php");
require_once(AMFPHP_BASE . "util/Compat.php");
require_once(AMFPHP_BASE . "filters/DeserializationFilter.php");
require_once(AMFPHP_BASE . "filters/DebugFilter.php");
require_once(AMFPHP_BASE . "filters/AuthenticationFilter.php");
require_once(AMFPHP_BASE . "filters/HeadersFilter.php");
require_once(AMFPHP_BASE . "filters/DescribeServiceFilter.php");
require_once(AMFPHP_BASE . "filters/BatchProcessFilter.php");
require_once(AMFPHP_BASE . "filters/SerializationFilter.php");
require_once(AMFPHP_BASE . "actions/AdapterAction.php");
require_once(AMFPHP_BASE . "actions/WebServiceAction.php");
require_once(AMFPHP_BASE . "actions/ClassLoaderAction.php");
require_once(AMFPHP_BASE . "actions/MetaDataAction.php");
require_once(AMFPHP_BASE . "actions/SecurityAction.php");
require_once(AMFPHP_BASE . "actions/ExecutionAction.php");
require_once(AMFPHP_BASE . "actions/MapperAction.php");
require_once(AMFPHP_BASE . "exception/AMFException.php");

/**
 * The Gateway class is the main facade for the AMFPHP remoting service.
 * 
 * The developer will instantiate a new gateway instance and will interface with
 * the gateway instance to control how the gateway processes request, securing the
 * gateway with instance names and turning on additional functionality for the gateway
 * instance.
 * 
 * An example gateway.php file that lived in the same directory as the flashservices
 * directory would look like:
 * <code>
 * <?php
 * include "flashservices/app/Gateway.php";
 * 
 * $gateway = new Gateway();
 * $gateway->setBaseClassPath("/Users/justinwatkins/Sites/services/");
 * $gateway->service();
 * ?>
 * </code>
 * 
 * @package flashservices
 * @subpackage app
 * @author Musicman  original design 
 * @author Justin Watkins  Gateway architecture, class structure, datatype io additions 
 * @author John Cowen  Datatype io additions, class structure, 
 * @author Klaasjan Tukker Modifications, check routiines, and register-framework 
 * @version $Id: Gateway.php,v 1.45 2005/07/22 10:58:09 pmineault Exp $
 */
class Gateway {
    var $error_List;
    var $_looseMode = false;
    var $_obLogging = false;
    var $_charsetMethod = "none";
    var $_charsetPhp = "";
    var $_charsetSql = "";
    var $exec;
    var $filters;
    var $actions;
    var $outgoingMessagesFolder = NULL;
    var $incomingMessagesFolder = NULL;
    
    /**
     * The Gateway constructor method.
     * 
     * The constructor method initializes the executive object so any configurations
     * can immediately propogate to the instance.  
     */
    function Gateway() {

        //Check what is the php version
        define("PHP5", PHP_VERSION >= 5 ? true : false);
     	$tmp = pack("d", 1); // determine the multi-byte ordering of this machine temporarily pack 1
        define("BIG_ENDIAN", $tmp == "\0\0\0\0\0\0\360\77");
		
        //Include right executive for php version
        //Try catch doesnt work properly 
    	if(PHP5)
    	{
    		//Set gloriously nice error handling
    		include_once(AMFPHP_BASE . "app/php5Executive.php");
    		include_once(AMFPHP_BASE . "exception/php5Exception.php");
    	}
    	else
    	{
    		include_once(AMFPHP_BASE . "app/Executive.php");
    		include_once(AMFPHP_BASE . "exception/php4Exception.php");
    	}
    	
        $this->exec = new Executive();
		$this->filters = array();
		$this->actions = array();
		$this->registerFilterChain();
		$this->registerActionChain();
        $this->filters['batch']->registerAction($this->actions);
    }

	/**
	 * Create the chain of filters
	 * Subclass gateway and overwrite to create a custom gateway
	 */
	function registerFilterChain()
	{
		//filters
		$this->filters['deserial'] = new DeserializationFilter();
		$this->filters['headers'] = new HeadersFilter();
		$this->filters['describeService'] = new DescribeServiceFilter();
		$this->filters['auth'] = new AuthenticationFilter();
		$this->filters['batch'] = new BatchProcessFilter();
		$this->filters['debug'] = new DebugFilter();
		$this->filters['serialize'] = new SerializationFilter();
	}
	
	/**
	 * Create the chain of actions
	 * Subclass gateway and overwrite to create a custom gateway
	 */
	function registerActionChain()
	{
		$this->actions['adapter'] = new AdapterAction();
		$this->actions['webService'] = new WebServiceAction();
		$this->actions['class'] = new ClassLoaderAction();
		$this->actions['meta'] = new MetaDataAction();
		$this->actions['security'] = new SecurityAction();
		$this->actions['mapper'] = new MapperAction();
		$this->actions['exec'] = new ExecutionAction();
	}

    /**
     * The service method runs the gateway application.  It turns the gateway 'on'.  You
     * have to call the service method as the last line of the gateway script after all of the
     * gateway configuration properties have been set.
     * 
     * Right now the service method also includes a very primitive debugging mode that
     * just dumps the raw amf input and output to files.  This may change in later versions.
     * The debugging implementation is NOT thread safe so be aware of file corruptions that
     * may occur in concurrent environments.
     */

    function service() {
        header(AMFPHP_CONTENT_TYPE); // define the proper header
        
        //Set the parameters for the charset handler
        CharsetHandler::setMethod($this->_charsetMethod);
        CharsetHandler::setPhpCharset($this->_charsetPhp);
        CharsetHandler::setSqlCharset($this->_charsetSql);
        
        //Attempt to call charset handler to catch any uninstalled extensions
        $ch = new CharsetHandler('flashtophp');
        $ch->transliterate('�');
        
        $ch2 = new CharsetHandler('sqltophp');
        $ch2->transliterate('�');
        
        if(isset($GLOBALS["HTTP_RAW_POST_DATA"]) && $GLOBALS["HTTP_RAW_POST_DATA"] != "")
        {
        	//Start NetDebug
        	NetDebug::initialize();
	        
        	//Enable loose mode if requested
        	if($this->_looseMode || true)
        	{
        		error_reporting(E_ALL & ~E_NOTICE);
        		ob_start();
        	}
	        $amf = new AMFObject(); // create the amf object
	        $amf->setInputStream($GLOBALS["HTTP_RAW_POST_DATA"]); // register the input stream
	        
	        if($this->incomingMessagesFolder != NULL)
	        {
	        	$mt = microtime();
	        	$pieces = explode(' ', $mt);
	    		$this->_saveRawDataToFile($this->incomingMessagesFolder . 
	    			'in.' . $pieces[1] . '.' . substr($pieces[0], 2) . ".amf", 
	    			$GLOBALS["HTTP_RAW_POST_DATA"]);
	    	}
     
	        foreach($this->filters as $key => $filter)
	        {
	        	$filter->invokeFilter($amf); // invoke the first filter in the chain
	        }
	        
	        $outstream = &$amf->getOutputStream(); // grab the output stream
	        $output = $outstream->flush();
	        
	        //Clear the current output buffer if requested
	        if($this->_looseMode)
	        {
	        	if($this->_obLogging !== FALSE)
	        	{
	        		AMFLogger::setLocation($this->_obLogging);
	        		AMFLogger::write(ob_get_clean());
	        	}
	        	else
	        	{
	        		ob_end_clean();
	        	}
	        }
			$output = $outstream->flush();
			
			//Send content length header
			//Thanks to Alec Horley for pointing out the necessity
			//of this for FlashComm support
			header("Content-length: " . strlen($output));
			
			//Send expire header, apparently helps for SSL
			//Thanks to Gary Rogers for that
			//And also to Lucas Filippi from openAMF list
			//And to Robert Reinhardt who appears to be the first who 
			//documented the bug
			//Finally to Gary who appears to have find a solution which works even more reliably
			header("Cache-Control: no-store, no-cache. must-revalidate, post-check=0, pre-check=0");

	        if($this->outgoingMessagesFolder != NULL)
	        {
	        	$mt = microtime();
	        	$pieces = explode(' ', $mt);
	    		$this->_saveRawDataToFile($this->outgoingMessagesFolder . 
	    			'out.' . $pieces[1] . '.' . substr($pieces[0], 2) . ".amf", $output);
	    	}			
			
	        print($output); // flush the binary data
        }
    }

    /**
     * Setter for the debugging directory property
     * 
     * @param string $dir The directory to store debugging files.
     */
     
    function setDebugDirectory($dir) {
        $this->debugdir = $dir;
    } 
    
    /**
     * Setter for error handling
     * 
     * @param the error handling level
     */
    function setErrorHandling($level)
    {
    	define('AMFPHP_ERROR_LEVEL', $level);
    }
    
    /**
     * Set an instance name for this gateway instance
     * Setting an instance name is used for restricted access to a gateway
     * If a gateway has an instance name, only service methods that have a matching instance
     * name can be used with the gateway
     * 
     * @param string $name The instance name to bind to the gateway instance, the default is <i>Instance1</i>
     */
    function setInstanceName($name = "Instance1") {
		$this->setActionParam('security', '_instanceName', $name);
    } 

    /**
     * Sets the base path for loading service methods.
     * 
     * Call this method to define the directory to look for service classes in.
     * Relative or full paths are acceptable
     * 
     * @param string $path The path the the service class directory
     */
    function setBaseClassPath($path) {
    	$path = realpath($path . '/') . '/';
    	$GLOBALS['classPath'] = $path;
		$this->setActionParam('adapter', '_basecp', $path);
		$this->setActionParam('mapper', '_basecp', $path);
    }

	/**
	 * Add a class mapping for adapters
	 */
	function addAdapterMapping($key, $value)
	{
		$GLOBALS['adapterMappings'][$key] = $value;
	}

    /**
     * Sets the meta data path for loading the service meta data
     * xml files.
     * 
     * @param string $path The path the of the meta data folder
     */
    function setMetaDataPath($path) {
		$this->setActionParam('meta', '_metadataPath', $path);
    } 
    
    /**
     * Sets the loose mode. This will enable outbut buffering
     * And flushing and set error_reporting to 0. The point is if set to true, a few
     * of the usual NetConnection.BadVersion error should disappear
     * Like if you try to echo directly from your function, if you are issued a 
     * warning and such. Errors should still be logged to the arror log though.
     *
     * @example In gateway.php, before $gateway->service(), use $gateway->setLooseMode(true) 
     * @param bool $mode Enable or disable loose mode
     */
    function setLooseMode($paramLoose = true) {
        $this->_looseMode = $paramLoose;
    } 
    
    /**
     * Sets the charset handler. 
     * The charset handler handles reencoding from and to a specific charset
     * for PHP and SQL resources.
     *
     * @param $method The method used for reencoding, either "none", "iconv" or "runtime"
     * @param $php The internal encoding that is assumed for PHP (typically ISO-8859-1)
     * @param $sql The internal encoding that is assumed for SQL resources
     */
    function setCharsetHandler($method = "none", $php, $sql) {
        $this->_charsetMethod = $method;
        $this->_charsetPhp = $php;
        $this->_charsetSql = $sql;
    } 
    
    /**
     * Set output buffering logging. If set to a valid, writeable location, AND 
     * loss mode is set to true, this will log all calls to echo, print, printf, any whitespace
     * in your class outside of < ? ? > etc. to a file. This gives you a very simple 
     * way to debug your files. Note that this is not thread-safe and obLogging should 
     * most likely be set to false in a production environment
     *
     * @example In gateway.php, before $gateway->service(), use $gateway->setObLogging("/tmp/oblog.txt") 
     * @param string $path The path of the log file to use
     */
    function setObLogging($paramOb = FALSE) {
        $this->_obLogging = $paramOb;
    } 

    /**
     * setWebServiceHandler is a method to choose the SOAP package to use for
     * web service calls. Should be set to php5 (SoapClient), pear or nusoap
     * 
     * @param string $handler Which service handler to use
     */
    function setWebServiceHandler($method = 'php5') {
		$this->setActionParam('webService', '_method', $method);
    } 
    
    /**
     * disableStandalonePlayer will exit the script (die) if the standalone
     * player is sees in the User-Agent signature
     * 
     * @param bool $bool Whether to disable the Standalone player
     */
    function disableStandalonePlayer($value = true) {
        if($value && $_SERVER['HTTP_USER_AGENT'] == "Shockwave Flash")
        {
        	trigger_error("Standalone Flash player disabled", E_USER_ERROR);
        	die();
        }
    } 

    /**
     * disableServiceDescription will stop the gateway for sending service 
     * descriptions to the IDE's service browser
     * 
     * @param bool $bool Whether to disable service description
     */
    function disableServiceDescription($value = true) {
		$this->setFilterParam('describeService', 'disable', $value);
    } 
    
    /**
     * disableTrace will ignore any calls to NetDebug::trace
     * 
     * @param bool $bool Whether to disable tracing
     */
    function disableTrace($value = true) {
    	$this->setFilterParam('debug', 'disableTrace', $value);
	} 
    
    /**
     * disableDebug will stop the debug headers from being sent 
     * (independant of trace)
     * 
     * @param bool $bool Whether to disable debug headers
     */
    function disableDebug($value = true) {
		$this->setFilterParam('debug', 'disableDebug', $value);
    }
    
    /**
     * Log incoming messages to the specified folder
     */
    function logIncomingMessages($folder = NULL)
    {
    	$this->incomingMessagesFolder = realpath($folder) . '/';
    }
    
    /**
     * Log outgoing messages to the specified folder
     */
    function logOutgoingMessages($folder = NULL)
    {
    	$this->outgoingMessagesFolder = realpath($folder) . '/';
    }

	/**
	 * Set a filter parameter iff the filter exists
	 */
	function setFilterParam($filter, $param, $value)
	{
		if(isset($this->filters[$filter]))
		{
			$this->filters[$filter]->$param = $value;
		}
	}
	
	/**
	 * Set an action parameter iff the filter exists
	 */
	function setActionParam($action, $param, $value)
	{
		if(isset($this->actions[$action]))
		{
			$this->actions[$action]->$param = $value;
		}
	}

    /**
     * Dumps data to a file
     * 
     * @param string $filepath The location of the dump file
     * @param string $data The data to insert into the dump file
     */
    function _saveRawDataToFile($filepath, $data) {
        if (!$handle = fopen($filepath, 'w')) {
            exit;
        } 
        if (!fwrite($handle, $data)) {
            exit;
        } 
        fclose($handle);
    }

    /**
     * Appends data to a file
     * 
     * @param string $filepath The location of the dump file
     * @param string $data The data to append to the dump file
     */
    function _appendRawDataToFile($filepath, $data) {
        if (!$handle = fopen($filepath, 'a')) {
            exit;
        }
        if (!fwrite($handle, $data)) {
            exit;
        }
        fclose($handle);
    }
    

    /**
     * Loads raw amf data from a file
     * 
     * @param string $filepath The location of the dump file
     * @return string The contents from the file
     */
    function _loadRawDataFromFile($filepath) {
        $handle = fopen($filepath, "r");
        $contents = fread($handle, filesize($filepath));
        fclose($handle);
        return $contents;
    }

    /**
     * Passes the content through to the appendRawDataToFile method
     * 
     * @param string $content The content to append to the data file.
     */
     
    function debug($content) {
        $this->_appendRawDataToFile($this->debugdir . "processing.txt", $content . "\n");
    }
    
}

?>