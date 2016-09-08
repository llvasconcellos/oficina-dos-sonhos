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
 * The NetDebug class includes a NetDebug->trace function that works
 * like the Flash one
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: NetDebug.php,v 1.1 2005/03/24 22:19:48 pmineault Exp $
 */
class NetDebug 
{
	/**
	 * Constructor
	 */
	function NetDebug()
	{
		
	}
	
	/**
	 * 
	 */
	function initialize()
	{
		
	}
	
	/**
	 * A static function that traces stuff in the NetDebug window
	 */
	function trace($what)
	{
		NetDebug::setTraceStack($what);
	}
	
	function getTraceStack($val=NULL)
	{
		static $traceStack = array();
		if($val !== NULL)
		{
			$traceStack[] = $val;
		}
		return $traceStack;
	}
	
	function setTraceStack($what)
	{
		NetDebug::getTraceStack($what);
	}
} 

?>