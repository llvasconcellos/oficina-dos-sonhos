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
require_once(AMFPHP_BASE . "util/Authenticate.php");

/**
 * 
 * @package flashservices
 * @subpackage actions
 * @version $Id: SecurityAction.php,v 1.11 2005/07/05 07:40:49 pmineault Exp $
 */
class SecurityAction {
	var $internalName = "SecurityAction";
    var $_ignoreMethodTable = false;

    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) {
    	$check = true;
        $this->bodyObj = &$amfbody;
        
        if(!$this->bodyObj->isWebService() && !$this->bodyObj->isDescribeService())
        {
	        if (!$this->bodyObj->getIgnoreExecution()) {
	        	
	            $this->_classConstruct = &$this->bodyObj->getClassConstruct();
	            $this->_methodname = $this->bodyObj->getMethodName();
	            $this->_classname = $this->bodyObj->getClassName();
				
				
	            if ($this->_methodname == "_authenticate") {
	            	$this->bodyObj->setIsAuthAction(true);
	                $check = $this->authenticateUser();
	            } else {
	                $this->methodrecord = &$this->_classConstruct->methodTable[$this->_methodname]; // create a shortcut for the ugly path
	                $check = $this->checkInstanceRestriction();
	                $check = $check && $this->checkAccess();
	                $check = $check && $this->checkRoles();
	            } 
	        } 
        }
        return $check;
    } 

    /**
     * makes sure the instance names are correctly matched
     */
    function checkInstanceRestriction () {
        if (isset($this->_instanceName) && isset($this->methodrecord['instance'])) { // see if we have an instance defined
            if ( $this->_instanceName != $this->methodrecord['instance']) { // if the names don't match die
                $ex = new AMFException(E_USER_ERROR, "The method {" . $this->_methodname . "} instance name does not match this gateway's instance name.", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return false;
            } 
        } else if (isset($this->methodrecord['instance'])) { // see if the method has an instance defined
            if ($this->_instanceName != $this->methodrecord['instance']) { // if the names don't match die
                $ex = new AMFException(E_USER_ERROR, "The restricted method {" . $this->_methodname . "} is not allowed through a non-restricted gateway.", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return false;
            } 
        } 
        return true;
    } 

    /**
     * checks to see if the authenticated user can access the protected method
     */
    function checkRoles () {
    	
        if (isset($this->methodrecord['roles'])) {
        	
            if (!Authenticate::isUserInRole($this->methodrecord['roles'])) {
                $ex = new AMFException(E_USER_ERROR, "This user is not does not have access to {" . $this->_methodname . "}.", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return false;
            } 
        } 
        return true;
    } 

    /**
     * checks to see if the method can be accessed remotely
     */
    function checkAccess () {
        if (!isset($this->methodrecord['access']) || (strtolower($this->methodrecord['access']) != "remote")) { // make sure we can remotely call it
            $ex = new AMFException(E_USER_ERROR, "ACCESS DENIED: The method {" . $this->_methodname . "} has not been declared a remote method.", __FILE__, __LINE__);
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

    function authenticateUser () {
        if (method_exists($this->_classConstruct, "_authenticate")) {
            $credentials = $this->bodyObj->getValue();
            
            //Fix for error in _authenticate
            //Pass throught the executive
            $roles = Executive::doMethodCall($this->bodyObj, 
            							$this->_classConstruct, 
            							'_authenticate', 
            							array($credentials['userid'], 
            								  $credentials['password']));
            if ($roles !== '__amfphp_error' && $roles !== false && $roles !== "") {
                Authenticate::login($credentials['userid'], $roles);
                return true;
            } else {
                Authenticate::logout();
                return false;
            } 
        } else {
            $ex = new AMFException(E_USER_ERROR, "The _authenticate method was not found.", __FILE__, __LINE__);
            AMFException::throwException($this->bodyObj, $ex);
            return false;
        } 
    } 

    function ignoreMethodTable () {
        $this->_ignoreMethodTable = true;
    } 
} 

?>