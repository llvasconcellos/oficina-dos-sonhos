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
 * @subpackage filters
 */

/**
* required files
*/
/**
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: BatchProcessFilter.php,v 1.8 2005/07/05 07:40:51 pmineault Exp $
 */
class BatchProcessFilter {
	var $internalName = "AuthenticationFilter";
	var $_classpath;
    function BatchProcessFilter () {
    } 

    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localRef = &$amf;
        $bodycount = $localRef->numBody();
        
        for ($i = 0; $i < $bodycount; $i++) {
            $bodyObj = &$localRef->getBodyAt($i);
            if (!$bodyObj->getIgnoreExecution()) {
            	foreach($this->_action as $key => $action)
            	{
					if(get_class($action) == 'stdClass')
					{
						trigger_error('A user error ::' . serialize(array_keys($this->_action)), E_USER_ERROR);
					}
					
                	$results = $action->doAction($bodyObj);
                	if($results === false)
                	{
                		break;
                	}
                }
            } 
        }
    } 

    /**
     * registerAction provides the implementation to register the action to
     * be performed by the batch process filter.
     * 
     * @param object $action The action to be performed
     */
    function registerAction (&$action) {
        $this->_action = &$action;
    } 
} 

?>