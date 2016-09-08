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
 * @subpackage debug
 */

/**
 * AMFMethodCall is the debug event to elaborate on each method call.
 * 
 * This class gathers all of the information necessary to let the
 * debugger know all of the information we know about the method call.
 * This information could be useful in determining any problems with
 * determing any errors that were involved with a method call.
 * 
 * @author Justin Watkins 
 * @package flashservices
 * @subpackage debug
 * @version $Id: AMFMethodCall.php,v 1.2 2004/02/29 06:03:33 justinwatkins Exp $
 */
class AMFMethodCall {
    /**
     * Constructor function.  Actually does the gathering of the debugging 
     * information.
     * 
     * @param Object $method The targeted method to elaborate on.
     */
    function AMFMethodCall ($method) {
        $this->EventType = "AmfMethodCall"; // name this event
        $this->Data = time(); // grab the data (not correct)
        $this->Time = time(); // grab the time
        $this->Source = "Server"; // set the source as server
        $this->TargetURI = $method->getTargetURI(); // pass back our target uri
        $this->ResponseURI = $method->getResponseURI(); // pass back our response uri
        $this->Type = $method->getType(); // pass back the type from the method table
        $this->ClassPath = $method->getClassPath(); // pass back the classpath
        $this->ClassName = $method->getClassName(); // pass back the class name
        $this->MethodName = $method->getMethodName(); // pass back the method name
        $this->Parameters = $method->getValue(); // pass back the arguments
    } 
} 

?>