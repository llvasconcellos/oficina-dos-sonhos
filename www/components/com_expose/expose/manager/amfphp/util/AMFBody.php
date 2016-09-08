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
 * @subpackage util
 */

/**
 * AMFBody is a data type that encapsulates all of the various properties a body object can have.
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: AMFBody.php,v 1.6 2005/07/05 07:40:53 pmineault Exp $
 */
class AMFBody {
    /**
     * The target URI
     * 
     * @var string 
     * @access private 
     */
    var $_targetURI;

    /**
     * The response URI
     * 
     * @var string 
     * @access private 
     */
    var $_responseURI;

    /**
     * The value
     * 
     * @var mixed 
     * @access private 
     */
    var $_value;

    /**
     * The type
     * 
     * @var string 
     * @access private 
     */
    var $_type;

    /**
     * The pagesize
     * 
     * @var int 
     * @access private 
     */
    var $_pagesize;
	
    /**
     * The passed in uri class path
     * 
     * @var string 
     * @access private 
     */
    var $_uriclasspath;

    /**
     * The classpath
     * 
     * @var string 
     * @access private 
     */
    var $_classpath;

    /**
     * The classname
     * 
     * @var string 
     * @access private 
     */
    var $_classname;

    /**
     * The method name
     * 
     * @var string 
     * @access private 
     */
    var $_methodname;

    /**
     * web service uri boolean
     * 
     * @var boolean 
     * @access private 
     */
    var $_isWebService = false;

    /**
     * describe service boolean
     * 
     * @var boolean 
     * @access private 
     */
	var $_isDescribeService = false;
	
    /**
     * The results from the process execution
     * 
     * @var mixed 
     * @access private 
     */
    var $_results;

    /**
     * Classconstruct is the instance of the service class
     * 
     * @var object 
     * @access private 
     */
    var $_classConstruct;

    /**
     * _ignoreExecution is a flag to tell the executive to ignore this class 
     * and not to try to execute the procedure
     * 
     * @var Boolean 
     * @access private 
     */
    var $_ignoreExecution;

    /**
     * _ignoreResults is a flag to tell the serializer to ignore the results
     * of the body message
     * 
     * @var Boolean 
     * @access private 
     */
    var $_ignoreResults;
    
    /**
     * _ignoreResults is a flag to tell the serializer to ignore the results
     * of the body message
     * 
     * @var Boolean 
     * @access private 
     */
    var $_isAuthAction = false;
    
    var $_isDynamicPage = false;
    var $_fastArrayProcessing = false;

    /**
     * AMFBody is the Contstructor method for the class
     */
    function AMFBody ($targetURI = "", $responseIndex = "", $value = "", $type = -1, $pagesize = -1) {
        $this->setTargetURI($targetURI);
        $this->setResponseIndex($responseIndex);
        $this->setResponseURI("/onStatus"); // default to the onstatus method
        $this->setValue($value);
        $this->setType($type);
        $this->setPageSize($pagesize);
    } 

    function setResponseIndex ($index) {
    	$GLOBALS['_lastMethodCall'] = $index;
        $this->_responseIndex = $index;
    } 

    function getResponseIndex () {
        return $this->_responseIndex;
    } 

    /**
     * setter for the targetURI property
     * 
     * @param string $targetURI The value for the target URI
     */
    function setTargetURI ($targetURI) {
        $this->_targetURI = $targetURI;
    } 

    /**
     * getter for the targetURI property
     * 
     * @return string The targetURI property
     */
    function getTargetURI () {
        return $this->_targetURI;
    } 

    /**
     * setter for the responseURI property
     * 
     * @param string $responseURI The value for the target URI
     */
    function setResponseURI ($responseURI) {
        $this->_responseURI = $this->_responseIndex . $responseURI;
    } 

    /**
     * getter for the responseURI property
     * 
     * @return string The responseURI property
     */
    function getResponseURI () {
        return $this->_responseURI;
    } 

    /**
     * setter for the value property
     * 
     * @param mixed $value The value of the body object
     */
    function setValue ($value) {
        $this->_value = $value;
    } 

    /**
     * getter for the value property
     * 
     * @return mixed The value property
     */
    function &getValue () {
        return $this->_value;
    } 

    /**
     * setter for the type property
     * 
     * @param string $type The return type
     */
    function setType ($type) {
        $this->_type = $type;
    } 

    /**
     * getter for the type property
     * 
     * @return string The type property
     */
    function getType () {
        return $this->_type;
    } 

    /**
     * setter for the pagesize property
     * 
     * @param int $pagesize The value for the pagesize
     */
    function setPageSize ($pagesize) {
        $this->_pagesize = $pagesize;
    } 

    /**
     * getter for the pagesize property
     * 
     * @return int The pagesize property
     */
    function getPageSize () {
        return $this->_pagesize;
    } 

    /**
     * setter for the class path
     * 
     * @param string $classpath The class path
     */
    function setClassPath ($classpath) {
        $this->_classpath = $classpath;
    } 

    /**
     * getter for the class path
     * 
     * @return string The classpath
     */
    function getClassPath () {
        return $this->_classpath;
    } 
	
    /**
     * setter for the class path
     * 
     * @param string $classpath The class path
     */
    function setUriClassPath ($classpath) {
        $this->_uriclasspath = $classpath;
    } 

    /**
     * getter for the class path
     * 
     * @return string The classpath
     */
    function getUriClassPath () {
        return $this->_uriclasspath;
    } 

    /**
     * setter for the class name
     * 
     * @param string $classname The class name
     */
    function setClassName ($classname) {
        $this->_classname = $classname;
    } 

    /**
     * getter for the class name
     * 
     * @return string The classname
     */
    function getClassName () {
        return $this->_classname;
    } 

    /**
     * setter for the method name
     * 
     * @param string $methodname The method name
     */
    function setMethodName ($methodname) {
        $this->_methodname = $methodname;
    } 

    /**
     * getter for the method name
     * 
     * @return string The method name
     */
    function getMethodName () {
        return $this->_methodname;
    } 

    /**
     * setter for the is web service switch
     * 
     * @param boolean $isWebService A boolean whether this is a web service the default is true
     */
    function setIsWebService ($isWebService = true) {
        $this->_isWebService = $isWebService;
    } 

    /**
     * getter for the is web service switch
     * 
     * @return boolean Whether this uri is a web service
     */
    function isWebService () {
        return $this->_isWebService;
    } 

    /**
     * setter for the is describe service switch
     * 
     * @param boolean $isDescribeService A boolean whether this is a describe service the default is true
     */
    function setIsDescribeService ($isWebService = true) {
        $this->_isDescribeService = $isWebService;
    } 

    /**
     * getter for the is describe service switch
     * 
     * @return boolean Whether this is used to describe the service through the remoting panel
     */
    function isDescribeService () {
        return $this->_isDescribeService;
    } 

    /**
     * setter for the results from the process execution
     * 
     * @param mixed $results The returned results from the process execution
     */
    function setResults ($result) {
        $this->_results = $result;
    } 

    /**
     * getter for the result of the process execution
     * 
     * @return mixed The results
     */
    function &getResults () {
        return $this->_results;
    } 

    /**
     * setter for the class construct
     * 
     * @param object $classConstruct The instance of the service class
     */
    function setClassConstruct (&$classConstruct) {
        $this->_classConstruct = &$classConstruct;
    } 

    /**
     * getter for the class construct
     * 
     * @return object The class instance
     */
    function &getClassConstruct () {
        return $this->_classConstruct;
    } 

    function setIgnoreExecution ($ignore) {
        $this->_ignoreExecution = $ignore;
    } 

    function getIgnoreExecution () {
        return $this->_ignoreExecution;
    } 

    function setIgnoreResults($ignore) {
        $this->_ignoreResults = $ignore;
    } 

    function getIgnoreResults () {
        return $this->_ignoreResults;
    } 

    function setIsDebug ($d) {
        $this->_isDebug = $d;
    } 
    function getIsDebug () {
        return $this->_isDebug;
    } 
    
    function setIsAuthAction ($d) {
        $this->_isAuthAction = $d;
    } 
    function getIsAuthAction () {
        return $this->_isAuthAction;
    } 
    
    function setIsDynamicPage ($d = true) {
        $this->_isDynamicPage = $d;
    } 
    function getIsDynamicPage () {
        return $this->_isDynamicPage;
    } 
    
    function getFastArrayProcessing()
    {
    	return $this->_fastArrayProcessing;
    }
    
    function setFastArrayProcessing($d = true)
    {
    	$this->_fastArrayProcessing = $d;
    }
    
} 

?>
