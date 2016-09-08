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
 * @subpackage actions
 */
/**
 * Required Classes
 */
//require_once(AMFPHP_BASE . "util/XMLReader.php");

/**
 * MetaDataAction loads the required info from the methodTable
 * Currently XML methodTable has been disabled for performance reasons; this
 * may change in the future
 *
 * @package flashservices
 * @subpackage actions
 * @version $Id: MetaDataAction.php,v 1.8 2005/07/05 07:40:49 pmineault Exp $
 */
class MetaDataAction {
	var $internalName = "MetaDataAction";

    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) {
        $this->bodyObj = &$amfbody;
        $check = true;
        if(!$this->bodyObj->isWebService() && !$this->bodyObj->isDescribeService())
        {
	        if (!$this->bodyObj->getIgnoreExecution()) {
	            $this->_classConstruct = &$this->bodyObj->getClassConstruct();
	            $this->_methodname = $this->bodyObj->getMethodName();
	            $this->_classname = $this->bodyObj->getClassName();
	            
				//$this->_classpath = $this->bodyObj->getUriClassPath();
				/*
	            if ($this->_ignoreMethodTable) {
	                $this->_classConstruct->methodTable[$this->_methodname] = array("access" => "remote");
	            else {
					if ($this->_checkMetaPath) {
					    $this->loadMetaData();
					}
				}
				*/
	            if ($this->_methodname == "_authenticate") {
	                $check = $this->checkIfMethodExists();
	            } else {
		            $check = $this->checkMethodTable();
		            $this->doAlias();
		            $check = $check && $this->checkIfMethodExists();
				}
	        } 
	    }
	    return $check;
    }

    function checkMethodTable () {
        if (!isset($this->_classConstruct->methodTable[$this->_methodname])) { // check to see if the methodTable exists
            $ex = new AMFException(E_USER_ERROR, "The method  {" . $this->_methodname . "} was not declared in the meta data for class {" . $this->_classname . "}.", __FILE__, __LINE__);
            AMFException::throwException($this->bodyObj, $ex);
            return false;
        } 
        return true;
    } 

    /**
     * figures out if the class is defined in the method table
     */
    function checkIfMethodExists () {
        if (!method_exists($this->_classConstruct, $this->_methodname)) { // check to see if the method exists
            $ex = new AMFException(E_USER_ERROR, "The method  {" . $this->_methodname . "} does not exist in class {" . $this->_classname . "}.", __FILE__, __LINE__);
            AMFException::throwException($this->bodyObj, $ex);
            return false;
        } 
        return true;
    } 
	
	/**
	 * Does the alias deal if required
	 */
	function doAlias()
	{
        //Check if there is an alias
        if(isset($this->_classConstruct->methodTable[$this->_methodname]) 
        	&& isset($this->_classConstruct->methodTable[$this->_methodname]['alias']))
        {
        	$this->bodyObj->setMethodName($this->_classConstruct->methodTable[$this->_methodname]['alias']);
        	$this->_methodname = $this->_classConstruct->methodTable[$this->_methodname]['alias'];
        }
	}
}
?>