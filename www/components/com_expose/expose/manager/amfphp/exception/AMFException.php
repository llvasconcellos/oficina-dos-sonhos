<?php
/**
 * THIS SOFTWARE IS PROVIDED "AS IS" AND ANY EXPRESSED OR IMPLIED WARRANTIES, INCLUDING,
 * BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
 * PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THsE POSSIBILITY OF SUCH DAMAGE.
 * 
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright (c) 2003 amfphp.org
 * @package flashservices
 * @subpackage exception
 */

/**
 * Linked classes
 */
require_once(AMFPHP_BASE . "app/Constants.php");

/**
 * Remove the html formatting of the error messages so they can be easily formatted
 * inside flash.
 */
ini_set("html_errors", 0);

/**
 * Make sure Notice Errors are not reported.  This won't script, but will
 * stop the execution of the serializer.
 */
//error_reporting(E_ALL ^ E_NOTICE);

/**
 * The Exception class is the internal static class used to output user defined
 * exceptions to the output stream.
 * 
 * @package flashservices
 * @subpackage exception
 * @author Justin Watkins Original Design 
 * @version $Id: AMFException.php,v 1.2 2005/04/02 18:37:23 pmineault Exp $
 */
class AMFException {
	/**
	 * Constructor for the Exception class. This is how you build a new
	 * error instance.
	 * 
	 * @param string $code The code string to return to the flash client :: THIS SHOULD PROBABLY BE SET AUTOMATICALLY ::
	 * @param string $description A short reason why the error occured
	 * @param string $file The file name that the error occured
	 * @param int $line The line number where the error was detected
	 */
    function AMFException ($code, $description, $file, $line) {
        $this->code = $code;
        $this->description = $description; // pass the description    
        $this->details = $file; // pass the details
        $this->level = Constants::getFriendlyError($code); 
        $this->line = $line; // pass the line number
    }
	
	/**
	 * throwException provides the means to raise an exception.  This method will 
	 * stop the further execution of the remote method, but not hault the execution
	 * of the entire process.  Using the built in PHP exception system will stop
	 * the entire process and not allow us to report very detailed information back
	 * to the client, especially if there are multiple methods.
	 * 
	 * When we upgrade to PHP 5, using the try...catch syntax will make this much easier.
	 * 
	 * @static
	 * @param AMFBody $body The AMFBody object to apply the exception to.
	 * @param AMFException @exception The exception object to throw
	 * @see AMFBody
	 */ 
    function throwException (&$body, $exception) {
        $body->setIgnoreExecution(true);
        $body->setIgnoreResults(false);
        $body->setResponseURI("/onStatus");
        $results = &$body->getResults();
        if (!isset($results["exceptionStack"])) {
            $results["exceptionStack"] = array();
	        $results["description"] = $exception->description;
	        $results["details"] = $exception->details;
	        $results["level"] = $exception->level;
	        $results["line"] = $exception->line;
	        $results["code"] = $exception->code;
        }
        $results["exceptionStack"][] = (array) $exception; 
    } 
} 

?>