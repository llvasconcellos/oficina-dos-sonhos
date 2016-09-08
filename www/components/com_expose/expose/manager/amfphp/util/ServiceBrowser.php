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
 * The ServiceBrowser class can generate a listing of class in the services folder 
 * and generate actionscript along with a listing of methods. It is therefore more complete than 
 * Flash's service browser (although the latter is still supported)
 * 
 * @access private 
 * @package flashservices
 * @subpackage util
 * @author John Cowen
 * @version $Id: ServiceBrowser.php,v 1.23 2005/07/25 01:33:19 pmineault Exp $
 */
class ServiceBrowser {
    /**
     * The location of the class to be browsed.
     * 
     * @access private 
     * @var string 
     */
    var $_classpath;
    /**
     * The name of the class to be browsed.
     * 
     * @access private 
     * @var string 
     */
    var $_classname;
    /**
     * The method to be tested.
     * 
     * @access private 
     * @var string 
     */
    var $_methodname;
    /**
     * An instance of the class being browsed.
     * 
     * @access private 
     * @var object 
     */
    var $_classConstruct;
    /**
     * Arguments used when tesing a method.
     * 
     * @access private 
     * @var array 
     */
    var $_arguments;
    /**
     * The location of the stylesheet to be used to format the markup.
     * 
     * @access private 
     * @var string 
     */
    var $_stylesheet;
    /**
     * Internal array of loaded classes
     * This needed because of issues with loading multiple files in different folders with
     * the same class name
     *
     * @access private
     * @var string
     */
    var $_classes;
    /**
     * Path to the classes
     *
     * @access private
     * @var string
     */
    var $_path;
    
    var $phpToAsTypes = array(
    	"string" => "String",
    	"int" => "Number",
    	"float" => "Number",
    	"double" => "Number",
    	"number" => "Number",
    	"boolean" => "Boolean",
    	"null" => "null",
    	"void" => "Void",
    	"undefined" => "null",
    	"date" => "Date",
    	"array" => "Array",
    	"object" => "Object",
    	"xml" => "XML");

    /**
     * Constructor method for the Service Browser class.
     * We do not use a unified constructor for PHP4 compatibility. (CH)
	 * 
	 * @param $path The path to the services folder.
     */
    function ServiceBrowser($path, $omit = array()) {
    	define("PRODUCTION_SERVER", false);
		$this->_path = $path;
        $this->_omit = $omit;

		if (isset($_GET['methodname'])) {
			$this->_methodname = $_GET['methodname'];
        }
        if (isset($_POST['arguments'])) {
            $this->_arguments = $_POST['arguments'];
        }
        $this->_basedir = getcwd();
    }


	/**
	 * Retrieves the list of services in a folder
	 *
	 * @param string $location The location of the folder containing services
	 *
	 */
	function listServices($dir = "", $suffix = "")
	{
		
        if($dir == "")
        {
            $dir = $this->_path;
        }
		$services = array();
		if($suffix == '') {$this->_classes = array();}
        if(in_array($suffix, $this->_omit)){ return; }
		if ($handle = opendir($dir . $suffix))
		{
			while (false !== ($file = readdir($handle))) 
			{
				chdir(dirname(__FILE__));
				if ($file != "." && $file != "..") 
				{
					if(is_file($dir . $suffix . $file))
					{
						$index = strrpos($file, '.');
						$before = substr($file, 0, $index);
						$after = substr($file, $index + 1);
						
						if($after == 'php')
						{
                            $services[] = array($before, $suffix);
							array_push($this->_classes, $before);
						}
						
					}
					elseif(is_dir($dir . $suffix . $file))
					{
						$insideDir = $this->listServices($dir, $suffix . $file . "/");
						if(is_array($insideDir))
						{
							foreach($insideDir as $key => $value)
							{
                                $services[] = array($value[0], $value[1]);
                                $this->_classes[] = $value[0];
							}
						}
					}
				}
			}
		}else{
			echo("error");
		}
		closedir($handle);
		return $services;
	}
	 
    /**
     * Sets the service to be browsed.
     * 
     * The classname can be passed or the class filename i.e MyClass or MyClass.php
     * 
     * @param string $class The location of the service class file
     */
    function setService($class) {
    	
        $this->_classpath = $class;
        // get classname
        $dot = strrpos($this->_classpath, ".");
        if ($dot === false) {
            // class name was passed
            $trunced = $this->_classpath;
            $this->_classpath .= ".php";
        } else {
            // class filename was passed
            $trunced = substr($this->_classpath, 0, $dot);
        } 
        //echo($trunced);
        $this->_classname = substr(strrchr('/' . $trunced, "/"), 1);
        $path = substr('/' . $trunced, 1 ,strrpos('/' . $trunced, "/"));
        chdir($this->_path . $path);
        include_once($this->_classname . '.php');
        
        if (class_exists($this->_classname)) {
            $this->_classConstruct = new $this->_classname(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            if(isset($this->_classConstruct->methodTable))
            {
            	
            	return true;
            }
            else
            {
            	return false;
            }
        } else {
        	return false;
        }
    } 
    /**
     * Sets the stylesheet to be used for formatting.
     * 
     * The classname can be passed or the class filename i.e MyClass or MyClass.php
     * 
     * @param string $path The location of the stylesheet file
     */
    function setStyleSheet($path) {
        $this->_stylesheet = $path;
    } 
    /**
     * 'Browses' the class.
     * 
     * If no method is being tested it will list the methods of the service class
     */
    function browse() {
        if (isset($this->_methodname)) {
            $this->_testMethod();
        } else {
            $this->_listMethods();
        } 
    } 
    /**
     * Prints out the headers and footers of the method list page and 
     * prints out the properties of each method through _printMethod.
     */
    function _listMethods() {
        echo '<html><head><title>Service ' . $this->_classpath . '</title><link rel="stylesheet" type="text/css" href="' . $this->_stylesheet . '" />';

        echo('<script language="JavaScript1.2">' . "\n");
        echo(' function selectCode(num)' . "\n");
        echo(' {' . "\n");
        echo('   var a=document.getElementById("ascode_" + num);' . "\n");
        echo('   if(document.createTextRange) { var range = a.createTextRange(); a.select();  } else { ' . "\n");
        echo('   a.select(); }' . "\n");
        echo(' }' . "\n");
        echo("</script>" . "\n");
        echo '</head><body><h2>Exploring ' . $this->_classpath . '</h2>';
		if(is_array($this->_classConstruct->methodTable))
		{
			foreach ($this->_classConstruct->methodTable as $name => $methodproperties) {
				$this->_printMethod($name, $methodproperties);
			}
		}
        chdir($this->_basedir);
        $templates = array();
		if ($handle = opendir('templates'))
		{
			while (false !== ($file = readdir($handle))) 
			{
				chdir(dirname(__FILE__));
				if ($file != "." && $file != "..") 
				{
					if(is_file($this->_basedir . '/templates/' . $file))
					{
						$index = strrpos($file, '.');
						$before = substr($file, 0, $index);
						$after = substr($file, $index + 1);
						
						if($after == 'php')
						{
							include($this->_basedir . '/templates/' . $file);
                            $templates[] = new $before;
						}
					}
				}
			}
		}
		
		function cmp ($a, $b)
		{ 
			 if ($a->priority == $b->priority) return 0;
			 return ($a->priority < $b->priority) ? 1 : -1;
		}
		# the index is the second element of
		# each row
		
		usort($templates, "cmp");
		
		$info = array();
		$info['package'] = str_replace("/" , "." , dirname($this->_classpath));
		if($info['package'] == '.')
		{
			$info['package'] = "";
		}
		else
		{
			$info['package'] .= ".";
		}
		$info['class'] = $this->_classname;
		$info['server'] = $_SERVER['SERVER_NAME'];
		
		$auth = false;
		$methods = array();
		foreach ($this->_classConstruct->methodTable as $name => $props) 
		{
			if($props['access'] == 'remote')
            {
            	$typedArgs = "";
            	$untypedArgs = "";
            	
            	if(isset($props['arguments']))
            	{
		            foreach($props['arguments'] as $key => $value) {
		                if(!is_array($value))
		                {
		                	$typedArgs .= ', ' . $value;
		                	$untypedArgs .= ', ' . $value;
		                }
		                else
		                {
		                	$untypedArgs .= ', ' . $key ;
		                	if(isset($value['type']))
		                	{
		                		if(!isset($this->phpToAsTypes[strtolower($value['type'])]))
		                		{
		                			$typedArgs .= ', ' . $key . ':' . $value['type'];
		                		}
		                		else
		                		{
		                			$typedArgs .= ', ' . $key . ':' . $this->phpToAsTypes[strtolower($value['type'])];
		                		}
		                	}
		                	else
		                	{
		                		$typedArgs .= ', ' . $value;
		                	}
		                	
		                }
		            } 
		        }
		        else
		        {
		        	$typedArgs = "  ";
		        	$untypedArgs = "  ";
		        }
	            $typedArgs = substr($typedArgs, 2);
	            $untypedArgs = substr($untypedArgs, 2);
				
				$methods[] = array(
					"description" => $props['description'],
					"methodName" => $name,
					"args" => $untypedArgs,
					"typedArgs" => $typedArgs,
				);
				
	            if(isset($props['roles']))
	            {
	                //At least one method requires auth
	                $auth = true;
	            }
            }
		}
		$info['methods'] = $methods;
		$info['auth'] = $auth;
		
		foreach($templates as $key => $tpl)
		{
			$code = $tpl->format($info);
	        echo('<p>' . $tpl->description . " | <a href='javascript:selectCode($key);''>Select text</a></p>");
	        echo "<textarea class='codex' id='ascode_$key' name='ascode_$key'>" . $code . '</textarea>';
		}
        
        echo "</body></html>";
    } 
    /**
     * Prints out the headers and footers of the method testing page and
     * either prints a form (through _printForm) for the user to enter arguments or, if arguments
     * are provided, prints the result of the method (through printResult).
     */
    function _testMethod() {
        echo '<html><head><title>Testing Service ' . $this->_classpath . ' Method ' . $this->_methodname . ' </title><link rel="stylesheet" type="text/css" href="' . $this->_stylesheet . '" /></head>';
        echo '<body>';
        echo '<h2>Testing ' . $this->_classpath . ' Method ' . $this->_methodname . '</h2>';
        if (count($this->_classConstruct->methodTable[$this->_methodname][arguments]) != 0) {
            if (!isset($this->_arguments)) {
                $this->_printForm();
            } else {
                $result = call_user_func_array(array(&$this->_classConstruct, $this->_methodname), $this->_arguments);
                $this->_printResult($result);
            } 
        } else {
            $a = array(null);
            $result = call_user_func_array(array(&$this->_classConstruct, $this->_methodname), $a);
            $this->_printResult($result);
        } 
        echo "</body></html>";
    } 

    /**
     * Prints out a table containing the method name and its
     * properties.
     * 
     * @param string $name The name of the method.
     * @param array $methodproperties The method properties, the information in the method table.
     */
    function _printMethod($name, $methodproperties) {
        // header - Method name and link
        echo '<div id="methods">';
        echo '<table class="methodtable">';
        //Method calling is temprarily disabled until we get it sorted out
        echo '<caption class="methodcaption">Method: ' . $name . '</caption>';
        //echo '<caption class="methodcaption">Method: <a class="header" href="details.php?class=' . $this->_classpath .
		//	'&methodname=' . $name . '">' . $name . '</a></caption>';
        foreach($methodproperties as $property => $value) {
            if (!is_array($value)) {
                $this->_printMethodProp($property, $value);
            } else {
                $this->_printArgs($property, $value);
            }
        }
        echo '</table>';
    }
    /**
     * Prints a row of a table containing the a property of the method table
     * This method copes with the description, access, roles, instance and
     * alias entries in the method table. Arguments are printed by _printArgs.
     * 
     * @param string $property The name of the property.
     * @param string $value The value of the property.
     */
    function _printMethodProp($property, $value) {
        echo '<tr class="methodrow"><td class="propname">' . nl2br($property) . '</td><td class="propValue">' . $value . '</td></tr>';
    } 
    /**
     * Prints a row of a table containing the an meta information of
     * an argument (taken from the method table).
     * The meta information is printed out in a similar format to the
     * Flash MX Service Browser.
     * 
     * @param string $property The name of the property.
     * @param string $value The value of the property.
     */
    function _printArgs($property, $value) {
        echo '<tr class="argrow"><td class="propname">' . $property . '</td><td class="propvalue">';
        if (count($value) == 0) {
            echo '<span>[none]</span>';
        } else {
            foreach($value as $subproperty => $subvalue) {
                if(!is_array($subvalue))
                {
                	echo $subvalue . '<br />';
                }
                else
                {
                	echo '<pre>' . $subproperty . " => ";
                	print_r($subvalue);
                	echo '</pre>';
                }
            } 
        }
        echo '</td></tr>';
    } 

    /**
     * Prints the form tags to create a form for entering argument values.
     */
    function _printForm() {
        echo '<form action="' . $_SERVER[PHP_SELF] . '?class=' . $this->_class . '&methodname=' . $this->_methodname . '" method="POST" id="form">';
        echo '<table class="formtable">';
        echo '<caption class="formcaption">Insert required arguments for: ' . $this->_classpath . '</caption>';
        foreach($this->_classConstruct->methodTable[$this->_methodname][arguments] as $key => $name) {
            $this->_printInput($name);
        } 
        echo '</table>';
		echo('<input type="submit">');
		echo('</form>');
    } 
    /**
     * Prints an input tag to enter a method argument
     */
    function _printInput($name) {
        echo '<tr class="inputrow"><td class="inputname">' . $name . '</td><td><input class="inputbox" type="text" name="arguments[]" maxlength="65535" /></td></tr>';
    } 
    /**
     * Prints the final result of a tested method
     *
     * @param mixed $result The result of the execution of the method.
     */
    function _printResult($result) {
        echo '<div id="results">';
        echo '<table class="resultstable">';
        echo '<caption class="resultscaption">Output of: ' . $this->_classpath . '</caption>';
        echo '<tr class="resultsrow">';
        if (is_object($result) || is_array($result) || is_resource($result)) {
            echo '<td>';
            echo '<code>';
            print_r($result);
            echo '</code>';
            echo '</td>';
        } else {
            echo '<td><code class="resultstext">' . $result . '</code></td>';
        } 
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    }
}

?>
