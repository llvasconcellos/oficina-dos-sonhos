<?php
/**
 * Creates the methodTable for a service class.
 *
 * @usage $this->methodTable = MethodTable::create($this);
 * @author Christophe Herreman
 * @since 05/01/2005
 * @version $id$
 * 
 * Special contributions by Allessandro Crugnola and Ted Milker
 */

if (!defined('T_ML_COMMENT')) {
   define('T_ML_COMMENT', T_COMMENT);
} else {
   define('T_DOC_COMMENT', T_ML_COMMENT);
}
 
class MethodTable
{
	/**
	 * Constructor.
	 *
	 * Since this class should only be accessed through the static create() method
	 * this constructor should be made private. Unfortunately, this is not possible
	 * in PHP4.
	 *
	 * @access private
	 */
	function MethodTable(){
	}


	/**
	 * Creates the methodTable for a passed class.
	 *
	 * @static
	 * @access public
	 * @param $className(String) The name of the service class.
	 *        May also simply be __FILE__
	 * @param $servicePath(String) The location of the classes (optional)
	 */
	function create($className, $servicePath = NULL){
		
		$methodTable = array();
		if(file_exists($className))
		{
			//The new __FILE__ way of doing things was used
			$sourcePath = $className;
		}
		else
		{
			$fullPath = str_replace('.', '/', $className);
			$className = $fullPath;
			if(strpos($fullPath, '/') !== FALSE)
			{
				$className = substr(strrchr($fullPath, '/'), 1);
			}
			
			if($servicePath == NULL)
			{
				if(isset($GLOBALS['classPath']))
				{
					$servicePath = $GLOBALS['classPath'];
				}
				else
				{
					$servicePath = "../services/";
				}
			}
			$sourcePath = $servicePath . $fullPath . ".php";
		}
		
		if(!file_exists($sourcePath))
		{
			trigger_error("The MethodTable class could not find {" . 
				$sourcePath . "}", 
				E_USER_ERROR);
		}
		
		$source = file_get_contents($sourcePath);
		$tokens = token_get_all($source);
		
		$waitingForOpenParenthesis = false;
		$waitingForFunction = false;
		$bufferingArgs = false;
		$argBuffer = "";
		$lastFunction = "";
		$lastFunctionComment = "";
		$classMethods = array();

		foreach($tokens as $token)
		{
		   if (is_string($token)) {
		   		if($token == '}')
		   		{
		   			$lastComment = '';
		   		}
		   		elseif($waitingForOpenParenthesis && $token == '(')
		   		{
		   			$bufferingArgs = true;
		   			$argBuffer = "";
		   			$waitingForOpenParenthesis = false;
		   		}
		   		elseif($bufferingArgs)
		   		{
		   			if($token != ')')
		   			{
		   				$argBuffer .= $token;
		   			}
		   			else
		   			{
		   				$classMethods[] = array("name" => $lastFunction,
		   								   "comment" => $lastFunctionComment,
		   								   "args" => $argBuffer);
		   				
		   				$bufferingArgs = false;
		   				$argBuffer = "";
		   				$lastFunction = "";
		   				$lastFunctionComment = "";
		   			}
		   			
		   		}
		   } else {
		       // token array
		       list($id, $text) = $token;
		 		
				if($bufferingArgs)
				{
					$argBuffer .= $text;					
				}
		 		
		       switch ($id) 
		       {
		           case T_COMMENT:
		           case T_ML_COMMENT: // we've defined this
		           case T_DOC_COMMENT: // and this
		           // no action on comments
		           		$lastComment = $text;
		           		break;
		           case T_FUNCTION:
		           		$waitingForFunction = true;
		           		break;
		           	case T_STRING:
		           		if($waitingForFunction)
		           		{
							$waitingForFunction = false;
							$waitingForOpenParenthesis = true;
							$lastFunction = $text;
							$lastFunctionComment = $lastComment;
							$lastComment = "";   			
		        		}
		        		break;
				}
			}
		}

		//remove the first method
		//this is the constructor and is not needed in the methodTable
		array_shift($classMethods);
	
		foreach ($classMethods as $key => $value) {
 			$methodSignature = $value['args'];
			$methodName = $value['name'];
			$methodComment = $value['comment'];
			
			$description = MethodTable::getMethodDescription($methodComment) . " " . MethodTable::getMethodCommentAttribute($methodComment, "desc");
			$description = trim($description);
			$access = MethodTable::getMethodCommentAttributeFirstWord($methodComment, "access");
			$roles = MethodTable::getMethodCommentAttributeFirstWord($methodComment, "roles");
			$instance = MethodTable::getMethodCommentAttributeFirstWord($methodComment, "instance");
			$returns = MethodTable::getMethodCommentAttributeFirstWord($methodComment, "returns");
			$pagesize = MethodTable::getMethodCommentAttributeFirstWord($methodComment, "pagesize");
						
			//description, arguments, access, [roles, [instance, [returns, [pagesize]]]]
			$methodTable[$methodName] = array();
			//$methodTable[$methodName]["signature"] = $methodSignature; //debug purposes
			$methodTable[$methodName]["description"] = ($description == "") ? "No description given." : $description;
			$methodTable[$methodName]["arguments"] = MethodTable::getMethodArguments($methodSignature);
			$methodTable[$methodName]["access"] = ($access == "") ? "private" : $access;
			
			if($roles != "") $methodTable[$methodName]["roles"] = $roles;
			if($instance != "") $methodTable[$methodName]["instance"] = $instance;
			if($returns != "") $methodTable[$methodName]["returns"] = $returns;
			if($pagesize != "") $methodTable[$methodName]["pagesize"] = $pagesize;
		}
		return $methodTable;
		
	}
	
	
	/**
	 * Returns the description from the comment.
	 * The description is(are) the first line(s) in the comment.
	 *
	 * @static
	 * @private
	 * @param $comment(String) The method's comment.
	 */
	function getMethodDescription($comment){
		$comment = explode("@", MethodTable::cleanComment($comment));
		
		return trim($comment[0]);
	}
	
	
	/**
	 * Returns the value of a comment attribute.
	 *
	 * @static
	 * @private
	 * @param $comment(String) The method's comment.
	 * @param $attribute(String) The name of the attribute to get its value from.
	 */
	function getMethodCommentAttribute($comment, $attribute){
		$pieces = explode('@' . $attribute, $comment);
		$pieces = explode('@', $pieces[1]);
		$pieces = explode('*/', $pieces[0]);
		return MethodTable::cleanComment($pieces[0]);
	}
	
	function getMethodCommentAttributeFirstWord($comment, $attribute){
		$pieces = explode('@' . $attribute, $comment);
		$val = MethodTable::cleanComment($pieces[1]);
		return trim(substr($val . ' ', 0, strpos($val . ' ', ' ')));
	}
	
	/**
	 * Returns an array with the arguments of a method.
	 *
	 * @static
	 * @access private
	 * @param $methodSignature (String)The method's signatureg;
	 */
	function getMethodArguments($methodSignature){
		if(strlen($methodSignature) == 0){
			//no arguments, return an empty array
			$result = array();
		}else{
			//clean the arguments before returning them
			$result = MethodTable::cleanArguments(explode(",", $methodSignature));
		}
		
		return $result;
	}
	
	
	/**
	 * Cleans the arguments array.
	 * This method removes all whitespaces and the leading "$" sign from each argument
	 * in the array.
	 *
	 * @static
	 * @access private
	 * @param $args(Array) The "dirty" array with arguments.
	 */
	function cleanArguments($args){
		$result = array();
		
		foreach($args as $arg){
			$parts = explode('=', substr(trim($arg), 1));
			$result[] = trim($parts[0]);
		}
		
		return $result;
	}
	
	
	/**
	 * Cleans the comment string by removing all comment start and end characters.
	 *
	 * @static
	 * @private
	 * @param $comment(String) The method's comment.
	 */
	function cleanComment($comment){
		$comment = str_replace("/**", "", $comment);
		$comment = str_replace("*/", "", $comment);
		$comment = str_replace("*", "", $comment);
		
		return eregi_replace("[\r\t\n ]+", " ", trim($comment));
	}

	/**
	 *
	 */
	function showCode($methodTable){
		$result = "\$this->methodTable = array(";

		foreach($methodTable as $methodName=>$methodProps){
			$result .= "\n\t\"" . $methodName . "\" => array(";
			
			foreach($methodProps as $key=>$value){
				$result .= "\n\t\t\"" . $key . "\" => ";

				if($key=="arguments"){
					$result .= "array(";
					for($i=0; $i<count($value); $i++){
						$result .= "\"" . $value[$i] . "\"";
						if($i<count($value)-1){
							$result .= ", ";
						}
					}
					$result .= ")";
				}else{
					$result .= "\"" . $value . "\"";
				}

				$result .= ",";
			}
			
			$result = substr($result, 0, -1);
			$result .= "\n\t),";
		}
		
		$result = substr($result, 0, -1);
		$result .= "\n);";
			
		return $result;
	}
}
?>