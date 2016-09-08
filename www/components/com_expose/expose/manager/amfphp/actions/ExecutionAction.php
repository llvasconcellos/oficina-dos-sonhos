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
require_once(AMFPHP_BASE . "util/NetDebug.php");

/**
 * 
 * @package flashservices
 * @subpackage actions
 * @version $Id: ExecutionAction.php,v 1.16 2005/07/22 10:58:08 pmineault Exp $
 */
class ExecutionAction {
	var $internalName = "ExecutionAction";
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfbody) 
    {
    	$exec = new Executive();
        $bodyObj = &$amfbody;
        if (!$bodyObj->getIgnoreExecution()) {
        	if(!$bodyObj->isWebService() && !$bodyObj->getIsAuthAction())
        	{
	            $construct = &$bodyObj->getClassConstruct();
	            $method = $bodyObj->getMethodName();
	            $args = $bodyObj->getValue();
	            
	            if(isset($construct->methodTable[$method]['fastArray']) &&
	               $construct->methodTable[$method]['fastArray'] == true)
	            {
	            	$bodyObj->setFastArrayProcessing(true);
	            }
	            
	            if($bodyObj->isDescribeService())
	            {
	            	include_once(AMFPHP_BASE . "util/DescribeService.php");
	            	$ds = new DescribeService();
	            	$results = $ds->describe($construct, $bodyObj->getClassName());
				}
				else
				{
					if($bodyObj->getIsDynamicPage())
					{
						$args[count($args) - 2] = $args[count($args) - 2] - 1;
						
						$dataset = Executive::doMethodCall($bodyObj, $construct, $method, $args);
						$results = array("cursor" => $args[count($args) - 2] + 1,
										 "data" => $dataset);
						$bodyObj->setType("__DYNAMIC_PAGE__");
					}
					else
					{
						if(isset($construct->methodTable[$method]['pagesize']))
						{
							//Check if counting method was overriden
							if(isset($construct->methodTable[$method]['countMethod']))
							{
								$counter = $construct->methodTable[$method]['countMethod'];
							}
							else
							{
								$counter = $method . '_count';
							}
							
							$dataset = $exec->doMethodCall($bodyObj, $construct, $method, $args); // do the magic
							$count = $exec->doMethodCall($bodyObj, $construct, $counter, $args);
							
							//Include the wrapper
							$results = array('class' => $bodyObj->getUriClassPath(), 
											 'method' => $bodyObj->getMethodName(), 
											 'count' => $count, 
											 "args" => $args, 
											 "data" => $dataset);
							$bodyObj->setType('__DYNAMIC_PAGEABLE_RESULTSET__');
						}
						else
						{
							//The usual
			            	$results = $exec->doMethodCall($bodyObj, $construct, $method, $args); // do the magic
			            }
			                   
			            //Do the pageableResult set magic
			            if(isset($construct->methodTable[$method]['pagesize']))
			            {
			            	$bodyObj->setPageSize($construct->methodTable[$method]['pagesize']);
			            }
		            }
		        }
	
				if($results !== '__amfphp_error')
				{
	            	$bodyObj->setResults($results);
	                if(isset($construct->methodTable[$method]['returns']))
	                {
	                    $bodyObj->setType($construct->methodTable[$method]['returns']);
	                }
		            $bodyObj->setResponseURI("/onResult");
	            }
            }
            else
            {
	            $bodyObj->setResponseURI("/onResult");
	        }
	    }
	    else
	    {
			if($bodyObj->getIsDynamicPage())
			{
				//Ignore PageAbleResult.release
            	$bodyObj->setResults(true);
                $bodyObj->setType('boolean');
	            $bodyObj->setResponseURI("/onResult");
			}
	    }
	    return true;
	}
} 

?>