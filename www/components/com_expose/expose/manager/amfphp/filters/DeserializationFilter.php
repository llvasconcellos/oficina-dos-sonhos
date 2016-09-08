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
require_once(AMFPHP_BASE . "io/AMFDeserializer.php");

/**
 * DeserializationFilter has the job of taking the raw input stream and converting in into valid php objects.
 * 
 * The DeserializationFilter is just part of a set of Filter chains used to manipulate the raw data.  Here we
 * get the input stream and convert it to php objects using the helper class AMFInputStream.
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: DeserializationFilter.php,v 1.6 2005/04/02 18:37:51 pmineault Exp $
 */
class DeserializationFilter {
	var $internalName = "DeserializationFilter";
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localCopy = &$amf; // save a reference to the amf object
        $inputStream = &$localCopy->getInputStream(); // save a reference to the input stream
        $deserializer = new AMFDeserializer($inputStream); // deserialize the data
        $deserializer->deserialize($amf); // run the deserializer
    }
}

?>