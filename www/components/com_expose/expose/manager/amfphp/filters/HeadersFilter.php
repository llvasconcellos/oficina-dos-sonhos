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
require_once(AMFPHP_BASE . "util/Headers.php");

/**
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: HeadersFilter.php,v 1.2 2005/07/22 10:58:10 pmineault Exp $
 */
class HeadersFilter {
	var $internalName = "HeadersFilter";
    /**
     * invokeFilter is an abstract method that the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localRef = &$amf;
        $headers = $amf->_headerTable;
        if(isset($headers) && is_array($headers))
        {
        	foreach($headers as $key => $value)
        	{
        		Headers::setHeader($value->getName(), $value->getValue());
        	}
        }
    }
} 

?>