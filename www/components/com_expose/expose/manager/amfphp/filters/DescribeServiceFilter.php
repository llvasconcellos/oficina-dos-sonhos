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
 * @version $Id: DescribeServiceFilter.php,v 1.7 2005/07/05 07:40:51 pmineault Exp $
 */
class DescribeServiceFilter {
	var $internalName = "DescribeServiceFilter";
	var $disable = false;
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localRef = &$amf;
        $describeHeader = $amf->getHeader(AMFPHP_SERVICE_BROWSER_HEADER);
       
        if ($describeHeader !== false) {
			if($this->disable)
			{
				//Exit 
				trigger_error("Service description not allowed", E_USER_ERROR);
				die();
			}
            $bodyCopy = &$amf->getBodyAt(0);
            $bodyCopy->setIsDescribeService(true);
        }
    } 
} 

?>