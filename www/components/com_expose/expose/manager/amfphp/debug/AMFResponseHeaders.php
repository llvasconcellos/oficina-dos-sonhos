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
 * AMFRequestHeaders gathers the information for a specific request header.
 * 
 * This class gathers and formats a request header to display that information
 * in the debugger.
 * 
 * @author Justin Watkins 
 * @package flashservices
 * @subpackage debug
 * @version $Id: AMFResponseHeaders.php,v 1.2 2004/02/29 06:03:33 justinwatkins Exp $
 */
class AMFResponseHeaders {
    /**
     * Constructor.
     * 
     * @param Object $header The incoming request header
     */
    function AMFResponseHeaders ($header) {
        $name = $header->getName(); // get the header key name
        $value = $header->getValue(); // get the header value
        $this->EventType = "AmfResponseHeaders"; // create the event type
        $this->MustUnderstand = $header->getRequired(); // save the must understand flag
        $this->Date = time(); // grab the date
        $this->Time = time(); // grab the Time
        $this->Source = "Server"; // set the source as server
        $this->AmfHeader = array (// output the amf header
            $name => $value
            );
    } 
} 

?>