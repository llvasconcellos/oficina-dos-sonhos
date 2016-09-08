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
 * AMFHeader is a data type that represents a single header passed via amf
 * 
 * AMFHeader encapsulates the different amf keys.
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: AMFHeader.php,v 1.4 2005/07/05 07:40:53 pmineault Exp $
 */
class AMFHeader {
    /**
     * Name is the string name of the header key
     * 
     * @var string 
     */
    var $_name;

    /**
     * Required is a boolean determining whether the remote system
     * must understand this header in order to operate.  If the system
     * does not understand the header then it should not execute the
     * method call.
     * 
     * @var boolean 
     */
    var $_required;

    /**
     * Value is the actual object value of the header key
     * 
     * @var mixed 
     */
    var $_value;

    /**
     * AMFHeader is the Constructor function for the AMFHeader data type.
     */
    function AMFHeader($name = "", $required = false, $value = null) {
        $this->_name = $name;
        $this->_required = $required;
        $this->_value = $value;
    } 

    /**
     * getter for the Name property
     * 
     * @return string The name of the header key
     */
    function getName () {
        return $this->_name;
    } 

    /**
     * getter for the required property
     * 
     * @return boolean The required property
     */
    function getRequired () {
        return $this->_required;
    } 

    /**
     * getter for the header value
     * 
     * @return mixed The value of the header key
     */
    function getValue () {
        return $this->_value;
    } 
} 

?>