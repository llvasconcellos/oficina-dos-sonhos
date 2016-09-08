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
 * @copyright (c) 2004 amfphp.org
 * @package flashservices
 * @subpackage actions
 * @version $Id: AdapterAction.php,v 1.9 2005/07/05 07:40:49 pmineault Exp $
 * @author Justin Watkins 
 */

/**
 * Linked classes
 */

/**
 * AdapterAction converts the rmi syntax used to define the path to the remote
 * class file and method and converts it to a format that the local system
 * can use to identify the file and method name.
 * 
 * This package also differentiates between a webservice call and a local service
 * invocation.
 * 
 * @package flashservices
 * @subpackage actions
 */
class AdapterAction {
	var $internalName = "AdapterAction";
    /**
     * The base class path to load the service files from.
     * 
     * @access private 
     * @var string 
     */
    var $_basecp = "services/";

    /**
     * invokeFilter is an abstract method that the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) {


		$uriclasspath = "";
        $classname = "";
        $classpath = "";
        $methodname = "";
        $isWebServiceURI = false;

        $bodyObj = &$amfbody;
        $target = $bodyObj->getTargetURI();
        
        if (strpos($target, "http://") === false && strpos($target, "https://") === false) { // check for a http link which means web service
            $lpos = strrpos($target, ".");
            if ($lpos === false) {
                // throw an error because there has to be atleast 1
            } else {
                $methodname = substr($target, $lpos + 1);
            } 
            $trunced = substr($target, 0, $lpos);
            $lpos = strrpos($trunced, ".");
            if ($lpos === false) {
                $classname = $trunced;
                if ($classname == "PageAbleResult" && $methodname == 'getRecords') {
                	$val = $bodyObj->getValue();
                	$id = $val[0];
                	$keys = explode("=", $id);
        			$currset = intval($keys[1]);
                	
                	$set = $_SESSION['amfphp_recordsets'][$currset];
                	
                	
					$uriclasspath = $set['class'];
                    $classpath = $this->_basecp . $set['class'];
                    $methodname = $set['method'];
                    
                    $classname = substr(strrchr('/' . $set['class'], '/'), 1, -4);
                    
                    //Now set args for body
                    $bodyObj->setValue(array_merge($set['args'], array($val[1], $val[2])));
                    
                    //Tell bodyObj that this is a dynamic paged resultset
                    $bodyObj->setIsDynamicPage();
                } 
                else if($classname == "PageAbleResult" && $methodname == 'release')
                {
                	$bodyObj->setIsDynamicPage();
                	$bodyObj->setIgnoreExecution(true);
                }
                else {
					$uriclasspath = $trunced . ".php";
                    $classpath = $this->_basecp . $trunced . ".php";
                } 
            } else {
                $classname = substr($trunced, $lpos + 1);
                $classpath = $this->_basecp . str_replace(".", "/", $trunced) . ".php"; // removed to strip the basecp out of the equation here
            	$uriclasspath = str_replace(".", "/", $trunced) . ".php"; // removed to strip the basecp out of the equation here
			} 
        } else { // launch a web service and not a php service
            $isWebServiceURI = true;
            $rdot = strrpos($target, ".");
            $classpath = substr($target, 0, $rdot);
            $methodname = substr($target, $rdot + 1);
        } 

        $bodyObj->setClassPath($classpath);
		$bodyObj->setUriClassPath($uriclasspath);
        $bodyObj->setClassName($classname);
        $bodyObj->setMethodName($methodname);
        $bodyObj->setIsWebService($isWebServiceURI);
        
        return true;
    } 
} 

?>