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
 * @subpackage utils
 */
/**
 * This class is used to map custom AS classes to custom PHP classes
 */
/**
 * 
 * @package flashservices
 * @subpackage actions
 * @version $Id: MapperAction.php,v 1.8 2005/07/25 01:33:10 pmineault Exp $
 * @author Patrick Mineault
 */
class MapperAction
{
	var $internalName = "MapperAction";
    /**
     * The base class path to load the service files from.
     * 
     * @access private 
     * @var string 
     */
    var $_basecp = "services/";
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) {

        $this->bodyObj = &$amfbody;
        
        //Standard types that don't need mapping
        //We're being fairly large here to handle fudges
        $types = array("null","void","undefined","boolean","string","int","float","double","number","date","array","object","xml");
        if(!$this->bodyObj->isWebService() && !$this->bodyObj->getIgnoreExecution())
        {
            $methodTable = &$this->bodyObj->_classConstruct->methodTable;
            $remoteArgs = &$this->bodyObj->getValue();
            
            //Stops E_NOTICE errors
            if(isset($methodTable[ $this->bodyObj->getMethodName() ]) &&
               isset($methodTable[ $this->bodyObj->getMethodName() ]["arguments"]))
            {
	            $localArgs = $methodTable[ $this->bodyObj->getMethodName() ]["arguments"];
	            
	            if(isset($localArgs) && is_array($localArgs))
	            {
	            	//Check if each of the local args has a type set
	            	$j = 0;
	            	foreach($localArgs as $key => $arg)
	            	{
	            		if(is_array($arg))
	            		{
	            			//Has some potential
	            			if(isset($arg['type']) && !in_array(strtolower($arg['type']), $types))
	            			{
	            				$remoteArgs[$j] = $this->attemptMapping($remoteArgs[$j], $arg['type']);
	            			}
	            		}
	            		$j++;
	            	}
	            }
	        }
	    }
	    return true;
    } 
    
    /**
     * Maps a Flash class to a PHP class
     * 
     * @arg $input Original arguments
     * @arg $output Name of the PHP class mapped
     */
	function attemptMapping($input, $output)
	{
		//Copy pasted from AdapterAction
		$target = $output;
        $lpos = strrpos($target, ".");
        if ($lpos === false) {
            $classname = $target;
			$uriclasspath = $target . ".php";
            $classpath = $this->_basecp . $target . ".php";
        } else {
            $classname = substr($target, $lpos + 1);
            $classpath = $this->_basecp . str_replace(".", "/", $target) . ".php"; // removed to strip the basecp out of the equation here
        	$uriclasspath = str_replace(".", "/", $target) . ".php"; // removed to strip the basecp out of the equation here
		}
		
		//Let's try to instantiate the class
		
		chdir(dirname($classpath)); // now change to the directory of the classpath.  Possible relative to gateway.php
        $fileIncluded = @include_once("./" . basename($classpath)); // include the class file
        $fileExists = @file_exists(basename($classpath)); // see if the file exists
        
        if (!class_exists($classname)) { // Just make sure the class name is the same as the file name
            if ($fileExists) { // file exists probably with errors
                $ex = new AMFException(E_USER_ERROR, "The mapped class {" . $classname . "} could not be loaded.  The class file exists but may contain syntax errors.", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return;
            } else {
                $ex = new AMFException(E_USER_ERROR, "The mapped class {" . $classname . "} could not be found under the class path {" . $classpath . "}", __FILE__, __LINE__);
                AMFException::throwException($this->bodyObj, $ex);
                return;
            } 
            return $input;
        }
        else
        {
			//Instantiate new class
			$mapped = new $classname();
			if(is_array($input))
			{
				foreach($input as $key => $value)
				{
					if($key != '_explicitType')
					{	
						//Input values
						$mapped->$key = $value;
					}
				}
			}
			return $mapped;
		}
	}
} 

?>