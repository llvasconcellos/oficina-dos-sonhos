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
 * XMLReader provides the xml parser to load and parse service meta data xml files.
 * 
 * @todo If there is an efficient method to validate the xml before it get's here, that
 * would be great.
 * @package flashservices
 * @subpackage util
 * @author Justin Watkins
 * @version $Id: XMLReader.php,v 1.1 2004/03/16 05:44:13 justinwatkins Exp $
 * 
 */
class XMLReader {
	var $xml;
	var $class;
	var $cMethod;
	var $cArgs;

    /**
     * startElement
     */
    function startElement($parser, $name, $attrs) {
		switch($name){
			case "class": 
				$this->class = $attrs;
				break;
			case "method": 
				$this->class[$attrs["name"]] = $attrs;
				$this->cMethod =& $this->class[$attrs["name"]];
				$this->cMethod["arguments"] = array();
				$this->cArgs =& $this->cMethod["arguments"];
				break;
			case "argument":
				$this->cArgs[$attrs["name"]] = $attrs;
				break;
		} // switch
    }

    /**
     * endElement
     */
    function endElement($parser, $name) { // cut last ->element
        return;
    } 

    /**
     * get_data: this is the
     * parser
     */
    function get_data ($doc) {
        $this->mioparser = xml_parser_create();
        xml_set_object($this->mioparser, $this);
        xml_set_element_handler ($this->mioparser, 'startElement', 'endElement');
        xml_parser_set_option ($this->mioparser, XML_OPTION_CASE_FOLDING, false);
        xml_parse($this->mioparser, $doc);
        if (xml_get_error_code($this->mioparser)) {	
            print "<b>XML error at line n. " .
            xml_get_current_line_number ($this->mioparser) . " -</b> ";
            print xml_error_string (xml_get_error_code($this->mioparser));
        } 
    } 

    /**
     * XMLReader::XMLReader()
     * 
     * @param string $doc The file name of the xml class to load
     **/
    function XMLReader($doc) {
        $this->xml = file_get_contents($doc);
        $this->get_data($this->xml);
    } 
} //end of class

?>