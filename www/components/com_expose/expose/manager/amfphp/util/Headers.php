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
 * The Headers class includes a static method getHeader available from all services
 * that allows one to get an AMF header from any service 
 * like the Flash one
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: Headers.php,v 1.1 2005/07/05 07:40:54 pmineault Exp $
 */
class Headers 
{
	/**
	 * Constructor
	 */
	function Headers()
	{
		
	}
	
	function setHeader($key=NULL, $val=NULL)
	{
		static $headers = array();
		if($val !== NULL)
		{
			$headers[$key] = $val;
		}
		return $headers[$key];
	}
	
	function getHeader($key)
	{
		return Headers::setHeader($key);
	}
} 

?>