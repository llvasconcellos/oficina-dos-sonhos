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
 * Required classes
 */
/**
 * HttpHeaders. Debug event subclass to cope with the http headers
 * debug request.
 * 
 * @package flashservices
 * @subpackage debug
 * @author Justin Watkins
 * @version $Id: TraceHeader.php,v 1.3 2005/07/05 07:40:51 pmineault Exp $
 */
class TraceHeader {
    /**
     * The constructor function for a new httpheaders subclass.
     * 
     * Sets out the table of data for the debug event
     * (the format of this table is not definitely the correct format!!)
     */
    function TraceHeader($traceStack) {
        $this->EventType = "trace";
        $this->Time = time();
        $this->Source = "Server";
        $this->Date = array(date("D M j G:i:s T O Y"));
        $this->messages = $traceStack;
        unset($this->_data);
    } 
} 

?>