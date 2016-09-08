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
 * @subpackage adapters
 */
/**
 * Required classes
 */
require_once(AMFPHP_BASE . "adapters/RecordSetAdapter.php");

/**
 * This Adapter translates the specific Database type links to the data and pulls the data into very
 * specific local variables to later be retrieved by the gateway and returned to the client.
 *
 * Adapted from Micah Caldwell's implementation on Flash-db.com boards
 * 
 * @package flashservices
 * @subpackage adapters
 * @version $Id: mysqliAdapter.php,v 1.2 2005/07/22 10:58:09 pmineault Exp $
 */

class mysqliAdapter extends RecordSetAdapter
{

	/**
	 * Constructor method for the adapter.  This constructor implements the setting of the
	 * 3 required properties for the object.
	 * 
	 * @param resource $d The datasource resource
	 */
     
	function mysqliAdapter($d)
	{
		parent::RecordSetAdapter($d);
		$fieldcount = mysqli_num_fields($d);
		
    	$ob = "";
    	$be = $this->isBigEndian;
    	$fc = pack('N', $fieldcount);
    	
        while ($line = mysqli_fetch_row($d)) {
        	// write all of the array elements
	        $ob .= "\12" . $fc;

	        foreach($line as $value)
	        { // write all of the array elements
				if (is_string($value)) 
		        { // type as string
		            $os = $this->_directCharsetHandler->transliterate($value);
		            //string flag, string length, and string
					$len = strlen($os);
			        if($len < 65536)
					{
			        	$ob .= "\2" . pack('n', $len) . $os;
					}
					else
					{
						$ob .= "\14" . pack('N', $len) . $os;
					}
		        }
		        elseif (is_float($value) || is_int($value)) 
		        { // type as double
			        $b = pack('d', $value); // pack the bytes
			        if ($be) { // if we are a big-endian processor
			            $r = strrev($b);
			        } else { // add the bytes to the output
			            $r = $b;
			        } 
			        $ob .= "\0" . $r;
		        } 
	            elseif (is_bool($value)) 
	            { //type as bool
		            $ob .= "\1";
        			$ob .= pack('c', $value);
		        } 
		        elseif (is_null($value)) 
		        { // null
		            $ob .= "\5";
		        } 
	        } 
        } 
        $this->serializedData = $ob;
		
		// loop over all of the fields
		
		while($field = mysqli_fetch_field($d))
		{   
			// decode each field name ready for encoding when it goes through serialization
			// and save each field name into the array
			$this->columnNames[] = $this->_directCharsetHandler->transliterate($field->name);
		}
		$this->numRows = mysqli_num_rows($d);
	}
}
?>