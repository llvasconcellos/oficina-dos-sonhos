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
require_once(AMFPHP_BASE . "io/AMFSerializer.php");
/**
 * The SerializationFilter is a step in the chain.  This step converts
 * the generated php data into the binary amf format so it can
 * be shipped back to the flash client.
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: SerializationFilter.php,v 1.5 2005/04/02 18:37:51 pmineault Exp $
 */
class SerializationFilter {
	var $internalName = "SerializationFilter";
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     *
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function invokeFilter (&$amf) {
        $localRef = &$amf; // save a reference to the amf data
        $out = &$localRef->getOutputStream(); // save a reference to the output stream
        $serializer = new AMFSerializer($out); // Create a serailizer around the output stream
        $serializer->serialize($amf); // serialize the data
    }
} 

?>