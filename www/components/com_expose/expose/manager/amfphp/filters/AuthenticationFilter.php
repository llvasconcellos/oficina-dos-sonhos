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
require_once(AMFPHP_BASE . "util/SessionManager.php");

/**
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: AuthenticationFilter.php,v 1.13 2005/07/22 10:58:10 pmineault Exp $
 */
class AuthenticationFilter {
	var $internalName = "AuthenticationFilter";
    /**
     * invokeFilter is an abstract method that the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localRef = &$amf;
        $authHeader = $amf->getHeader(AMFPHP_CREDENTIALS_HEADER);
        
        //In PHP5, objects are always pass-by-ref, hence this branch
        if(PHP5)
        {
        	$bodyCopy = clone($amf->getBodyAt(0));
        }
        else
        {
        	$bodyCopy = $amf->getBodyAt(0);
        }

        if ($authHeader !== false && $authHeader->getValue() !== AMFPHP_CLEARED_CREDENTIALS) {
            $uri = $bodyCopy->getTargetURI();
            $lpos = strrpos($uri, ".");
            $cp = substr($uri, 0, $lpos + 1) . "_authenticate";
            $bodyCopy->setTargetURI($cp);
            $bodyCopy->setIgnoreResults(true);
            $val = $authHeader->getValue();
            $bodyCopy->setValue($val);
            $amf->addBodyAt(0, $bodyCopy);
            
            //Make it so that the data will stop being transmitted
            $clearHeader = array('name' => 'Credentials', 'mustUnderstand' => false, 
				'data' => AMFPHP_CLEARED_CREDENTIALS);
            $outHeader = new AMFHeader("RequestPersistentHeader", true, $clearHeader);
            $localRef->addOutgoingHeader($outHeader);
        }

        $session_id = SessionManager::startSession();
        if(!$bodyCopy->isDescribeService() && !strstr($_SERVER['QUERY_STRING'], $session_id))
        {
			/**
			 Instead of trying to guess if using https, 
			 just use AppendTogGatewayUrl instead
			 of ReplaceGatewayUrl
			*/
            $outHeader = new AMFHeader("AppendToGatewayUrl", false, "?" . ini_get('session.name') . "=" . $session_id);
            $localRef->addOutgoingHeader($outHeader);
        }
    } 
} 

?>