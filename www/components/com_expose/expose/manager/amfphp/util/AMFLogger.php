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
 * The Logger package is available to any service to easily write data to a log.
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: Logger.php,v 1.2 2005/02/05 21:45:37 pmineault Exp $
 *
 * getAuthUser did not do anything in previous versions, hence it has been eliminated
 */
class AMFLogger {

	/**
	 * Sets the location of the log. File should be chmodded to 0777
	 *
	 * @param string $location The absolute path to the location of the log
	 */
	function getLocation($val=NULL)
	{
		static $location = 0;
		if($val != NULL)
		{
			$location = $val;
		}
		return $location;
	}
	
	function setLocation($val=0){
		return AMFLogger::getLocation($val);
	}
	
	/**
	* Returns the numbers of seconds since the Unix epoch
	*/
	
    function microtime_float()
    {
       list($usec, $sec) = explode(" ", microtime());
       return ((float)$usec + (float)$sec);
    }
	
    /**
     * Appends some data to the log file. Location must be specified first
     * using setLocation
     * 
     * @return bool Whether the writing was succesful
     */
    function write($data) 
    {
        if (!$handle = fopen(AMFLogger::getLocation(), 'a')) {
            return false;
        }
        if (!fwrite($handle, $data . "\n")) {
            return false;
        }
        fclose($handle);
        return true;
    } 

} 

?>