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
 * AMFActionChain is required because it is the super class of all actions
 */

/**
 * 
 * @package flashservices
 * @subpackage actions
 * @version $Id: ClassLoaderAction.php,v 1.12 2005/07/05 07:40:49 pmineault Exp $
 * @author Justin Watkins 
 */
class ClassLoaderAction {
	var $internalName = "ClassLoaderAction";
	var $checkSyntax = false;
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) {
		 
        $this->bodyObj = &$amfbody;
        if(!$this->bodyObj->isWebService())
        {
	        if (!$this->bodyObj->getIgnoreExecution()) {
	        	 
	            $this->_methodname = $this->bodyObj->getMethodName();
	            $this->_classpath = $this->bodyObj->getClassPath();
	            $this->_classname = $this->bodyObj->getClassName();
	            
	            $loaded = $this->loadServiceClass();
	            
	            if(!$loaded)
	            {
	            	return false;
	            }

	            if (class_exists($this->_classname)) {
	                //Let executive handle building the class
	                //The executive can handle making exceptions and all that, that's why
	                $classConstruct = Executive::buildClass($this->bodyObj, $this->_classname);

					if($classConstruct !== '__amfphp_error')
					{
		                $this->bodyObj->setClassConstruct($classConstruct);
		            }
		            else return false;
	            } else {
	                $ex = new AMFException(E_USER_ERROR, "The class {" . $this->_classname . "} could not be constructed, check the stack trace for the root cause", __FILE__, __LINE__);
	                AMFException::throwException($this->bodyObj, $ex);
	                return false;
	            }
	        } 
	    }
	    return true;
    } 

    /**
     * loadServiceClass grabs the service class file
     */
    function loadServiceClass () {
        // change to the gateway.php script directory
		// now change to the directory of the classpath.  Possible relative to gateway.php
        $dirname = dirname($this->_classpath); 
        if(is_dir($dirname))
        {
        	chdir($dirname);
        }
        else
        {
    	    $ex = new AMFException(E_USER_ERROR, "The classpath folder {" . $this->_classpath . "} does not exist. You probably misplaced your service." , __FILE__, __LINE__);
            AMFException::throwException($this->bodyObj, $ex);
            return false;
        }

        $this->_calledMethod = $this->_methodname; // store the called method name DEPRECATED ???
        
        $fileExists = @file_exists(basename($this->_classpath)); // see if the file exists
        if(!$fileExists)
        {
        	    $ex = new AMFException(E_USER_ERROR, "The class {" . $this->_classname . "} could not be found under the class path {" . $this->_classpath . "}" , __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return false;
        }
        
        $fileIncluded = Executive::includeClass($this->bodyObj, "./" . basename($this->_classpath));

        if (!$fileIncluded) 
        { 
			$ex = new AMFException(E_USER_ERROR, "The class file {" . $this->_classname . "} exists but could not be included. The file may have syntax errors, or includes at the top of the file cannot be resolved.", __FILE__, __LINE__);
			AMFException::throwException($this->bodyObj, $ex);
			return false;
        }

        if (!class_exists($this->_classname)) 
        { // Just make sure the class name is the same as the file name
                $ex = new AMFException(E_USER_ERROR, "The file {" . $this->_classname . ".php} exists and was included correctly but a class by that name could not be found in that file. Perhaps the class is misnames or you are running into a case-sensitivity issue, or the class exists but contains syntax errors.", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return false;
        }
        return true;
    } 
} 
?>