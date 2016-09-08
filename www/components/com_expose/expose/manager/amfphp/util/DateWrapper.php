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
 * The DateWrapper allows easy handling of Flash dates 
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: DateWrapper.php,v 1.1 2005/03/24 22:19:48 pmineault Exp $
 */
class DateWrapper 
{
	var $_date;
	/** 
	 * Contructor
	 */
	function DateWrapper($input = "")
	{
		if(is_int($input) || is_float($input))
		{
			$this->_date = $input/1000;
		}
		else
		{
			$this->_date = time();
		}
	}
	
	/**
	 * Get date according to client timezone
	 */
	function getClientDate()
	{
		return $this->_date + DateWrapper::getTimezone();
	}
	
	/**
	 * Get date according to server timezone
	 */
	function getServerDate()
	{
		return ($this->_date + date("Z"));
	}
	
	/**
	 * Get raw date
	 */
	function getRawDate()
	{
		return $this->_date;
	}
	
	/**
	 * Set utc date
	 */
	function setDate($input)
	{
		$this->_date = $input;
	}
	
	/**
	 * Get timezone
	 */
	function getTimezone($val=NULL)
	{
		static $timezone = 0;
		if($val != NULL)
		{
			$timezone = $val;
		}
		return $timezone;
	}
	
	/**
	 * Set timezone
	 */
	function setTimezone($val=0){
		return DateWrapper::getTimezone($val);
	}
} 

?>