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
 * @subpackage io
 */

/**
 * Required classes
 */ 
require_once(AMFPHP_BASE . "util/AMFBody.php");
require_once(AMFPHP_BASE . "util/AMFHeader.php");
require_once(AMFPHP_BASE . "util/DateWrapper.php");

/**
 * AMFDeserializer takes the raw amf input stream and converts it PHP objects
 * representing the data.
 * 
 * @package flashservices
 * @subpackage io
 * @version &Id$
 */
class AMFDeserializer {
    /**
     * The number of headers in the packet.
     * 
     * @access private 
     * @var int 
     */
    var $header_count;

    /**
     * The content of the packet headers
     * 
     * @access private 
     * @var string 
     */
    var $headers;

    /**
     * The number of bodys in the packet.
     * 
     * @access private 
     * @var int 
     */
    var $body_count;

    /**
     * The content of the body elements
     * 
     * @access private 
     * @var string 
     */
    var $body;

    /**
     * The object to store the amf data.
     * 
     * @access private 
     * @var object 
     */
    var $amfdata;

    /**
     * The instance of the amfinput stream object
     * 
     * @access private 
     * @var object 
     */
    var $inputStream;
    
    /**
     * metaInfo
     */
    var $meta;

    /**
     * Constructor method for the deserializer.  Constructing the deserializer converts the input stream
     * content to a AMFObject.
     * 
     * @param object $is The referenced input stream
     */
    function AMFDeserializer(&$is) {
        $this->inputStream = &$is; // save the input stream in this object
    } 

    /**
     * deserialize invokes this class to transform the raw data into valid object
     * 
     * @param object $amfdata The object to put the deserialized data in
     */
    function deserialize (&$amfdata) {
        $this->amfdata = &$amfdata;
        $this->readHeader(); // read the binary header
        $this->readBody(); // read the binary body
    } 
    /**
     * returns the built AMFObject from the deserialization operation
     * 
     * @return object The deserialized AMFObject
     */
    function getAMFObject() {
        return $this->amfdata;
    } 

    /**
     * readHeader converts that header section of the amf message into php obects.
     * Header information typically contains meta data about the message.
     */
    function readHeader() {

        $topByte = $this->inputStream->readByte(); // ignore the first two bytes -- version or something
        $secondByte = $this->inputStream->readByte(); //0 for Flash,
        												//1 for FlashComm					
       	//Disable debug events for FlashComm
       	define('IS_FLASH_COMM', $secondByte == 1);
        	
        //If firstByte != 0, then the AMF data is corrupted, for example the transmission 
        //
        if(!$topByte == 0 || $topByte == 3)
        {
        	trigger_error("Malformed AMF message, connection may have dropped");
        	exit();
        }
        $this->header_count = $this->inputStream->readInt(); // find the total number of header elements
        while ($this->header_count--) { // loop over all of the header elements
            $name = $this->inputStream->readUTF();
            $required = $this->readBoolean(); // find the must understand flag
            $length = $this->inputStream->readLong(); // grab the length of the header element
            $type = $this->inputStream->readByte(); // grab the type of the element
            $content = $this->readData($type); // turn the element into real data
            $this->amfdata->addHeader(new AMFHeader($name, $required, $content)); // save the name/value into the headers array
        }

    } 

    /**
     * readBody converts the payload of the message into php objects.
     */
    function readBody() {
        $this->body_count = $this->inputStream->readInt(); // find the total number of body elements
        while ($this->body_count--) { // loop over all of the body elements
            $target = $this->readString();
            $response = $this->readString(); // the response that the client understands
            $length = $this->inputStream->readLong(); // grab the length of the body element
            $type = $this->inputStream->readByte(); // grab the type of the element
            $data = $this->readData($type); // turn the argument elements into real data
            $this->amfdata->addBody(new AMFBody($target, $response, $data)); // add the body element to the body object
        } 
    } 

    /**
     * readObject reads the name/value properties of the amf message and converts them into
     * their equivilent php representation
     * 
     * @return array The php array with the object data
     */
    function readObject() {
        $ret = array(); // init the array
        $key = $this->inputStream->readUTF(); // grab the key
        for ($type = $this->inputStream->readByte(); $type != 9; $type = $this->inputStream->readByte()) {
            $val = $this->readData($type); // grab the value
            $ret[$key] = $val; // save the name/value pair in the array
            $key = $this->inputStream->readUTF(); // get the next name
        }
        return $ret; // return the array
    } 
    
    /**
     * readMixedObject reads the name/value properties of the amf message and converts
     * numeric looking keys to numeric keys
     * 
     * @return array The php array with the object data
     */
    function readMixedObject() {
        $ret = array(); // init the array
        $key = $this->inputStream->readUTF(); // grab the key
        for ($type = $this->inputStream->readByte(); $type != 9; $type = $this->inputStream->readByte()) {
            $val = $this->readData($type); // grab the value
            if(is_numeric($key))
            {
            	$key = (float) $key;
            }
            $ret[$key] = $val; // save the name/value pair in the array
            $key = $this->inputStream->readUTF(); // get the next name
        }
        return $ret; // return the array
    } 

    /**
     * readArray turns an all numeric keyed actionscript array into a php array.
     * 
     * @return array The php array
     */
    function readArray() {
        $ret = array(); // init the array object
        $length = $this->inputStream->readLong(); // get the length of the array
        for ($i = 0; $i < $length; $i++) { // loop over all of the elements in the data
            $type = $this->inputStream->readByte(); // grab the type for each element
            $ret[] = $this->readData($type); // grab each element
        } 
        return $ret; // return the data
        
    } 

    /**
     * readMixedArray turns an array with numeric and string indexes into a php array
     * 
     * @return array The php array with mixed indexes
     */
    function readMixedArray() {
        $length = $this->inputStream->readLong(); // get the length property set by flash
        return $this->readMixedObject(); // return the body of mixed array
    } 

    /**
     * readCustomClass reads the amf content associated with a class instance which was registered
     * with Object.registerClass.  In order to preserve the class name an additional property is assigned
     * to the object "_explicitType".  This property will be overwritten if it existed within the class already.
     * 
     * @return object The php representation of the object
     */
    function readCustomClass() {
        $typeIdentifier = $this->inputStream->readUTF();
        $value = $this->readObject(); // the rest of the bytes are an object without the 0x03 header
        $value["_explicitType"] = $typeIdentifier; // save that type because we may need it if we can find a way to add debugging features
        return $value; // return the object
    } 

    /**
     * readNumber reads the numeric value and converts it into a useable number
     * 
     * @return int The number
     */
    function readNumber() {
        return $this->inputStream->readDouble(); // grab the binary representation of the number
    } 

    /**
     * readBoolean reads the boolean byte and returns true only if the value of the byte is 1
     * 
     * @return bool the Boolean value
     */
    function readBoolean() {
        $int = $this->inputStream->readByte(); // grab the int value of the next byte
        return $int == 1; // if it's a 0x01 return true else return false
    } 

    /**
     * readString reads the string from the amf message and returns it.
     * 
     * @return string The string
     */
    function readString() {
        return $this->inputStream->readUTF();
    } 
    
    /**
     * readLongString reads the string from the amf message and returns it.
     * 
     * @return string The string
     */
    function readLongString() {
        return $this->inputStream->readLongUTF();
    } 

    /**
     * readDate reads a date from the amf message and returns the time in ms.
     * This method is still under development.
     * 
     * @return long The date in ms.
     */
    function readDate() {
        $ms = $this->inputStream->readDouble(); // date in milliseconds from 01/01/1970
        $int = $this->inputStream->readInt(); // nasty way to get timezone
        if ($int > 720) {
            $int = - (65536 - $int);
        } 
        $int *= -60;
        //$int *= 1000;
        //$min = $int % 60;
        //$timezone = "GMT " . - $hr . ":" . abs($min);
        // end nastiness
        
		//We store the last timezone found in date fields in the request
		//FOr most purposes, it's expected that the timezones
		//don't change from one date object to the other (they change per client though)
		DateWrapper::setTimezone($int);
        return $ms; 
    }

    /**
     * readXML reads the xml string from the amf message and returns it.
     * 
     * @return string The XML string
     */
    function readXML() { // XML reading function
        $rawXML = $this->inputStream->readLongUTF(); // reads XML
        return $rawXML;
    } 

    /**
     * readReference replaces the old readFlushedSO. It treats where there
     * are references to other objects. Currently it does not resolve the
     * object as this would involve a serious amount of overhead, unless
     * you have a genius idea
     * 
     * @return String 
     */
    function readReference() {
        $reference = $this->inputStream->readInt();
        return "(unresolved object #$reference)";
    } 

    /**
     * object Button, object Textformat, object Sound, object Number, object Boolean, object String,
     * SharedObject unflushed, XMLNode, used XMLSocket??, NetConnection,
     * SharedObject.data, SharedObject containing 'private' properties
     * 
     * the final byte seems to be the dataType -> 0D
     * 
     * @return null 
     */
    function readASObject() {
        return null;
    } 

    /**
     * readData is the main switch for mapping a type code to an actual
     * implementation for deciphering it.
     * 
     * @param mixed $type The $type integer
     * @return mixed The php version of the data in the message block
     */
    function readData($type) {
        switch ($type) {
            case 0: // number
                $data = $this->readNumber();
                break;
            case 1: // boolean
                $data = $this->readBoolean();
                break;
            case 2: // string
                $data = $this->readString();
                break;
            case 3: // object Object
                $data = $this->readObject();
                break;
            case 5: // null
                $data = null;
                break;
            case 6: // undefined
                $data = null;
                break;
            case 7: // Circular references are returned here
                $data = $this->readReference();
                break;
            case 8: // mixed array with numeric and string keys
                $data = $this->readMixedArray();
                break;
            case 10: // array
                $data = $this->readArray();
                break;
            case 11: // date
                $data = $this->readDate();
                break;
            case 12: // string, strlen(string) > 2^16
                $data = $this->readLongString();
                break;
            case 13: // mainly internal AS objects
                $data = $this->readASObject();
                break;
            case 15: // XML
                $data = $this->readXML();
                break;
            case 16: // Custom Class
                $data = $this->readCustomClass();
                break;
            default: // unknown case
                trigger_error("Found unhandled type with code: $type");
                exit();
                break;
        } 
        return $data;
    } 
} 

?>