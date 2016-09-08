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
 * Adapted from Adam Schroeder's implementation on Flash-db.com boards
 *
 * Now using fast serialization
 * 
 * @package flashservices
 * @subpackage adapters
 * @version $Id: sqliteAdapter.php,v 1.1 2005/07/05 07:56:29 pmineault Exp $
 */

class sqliteAdapter extends RecordSetAdapter
{

	/**
	 * Constructor method for the adapter.  This constructor implements the setting of the
	 * 3 required properties for the object.
	 * 
	 * @param resource $d The datasource resource
	 */
     
	function sqliteAdapter($d)
	{
		parent::RecordSetAdapter($d);
		// grab all of the rows
		
		$fieldcount = sqlite_num_fields($d);
		$ob = "";
		$fc = pack('N', $fieldcount);
		
		while ($line = sqlite_fetch_array($d, SQLITE_NUM)) {
			//Write array flag + length
	        $ob .= "\12" . $fc;
	        
			$to = count($line);
            for($i = 0; $i < $to; $i++)
            { //Type everything as a string since this is sqlite
            	$value = $line[$i];
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
		}
		
		// grab the number of fields
		
		
		// loop over all of the fields
		for($i=0; $i<$fieldcount; $i++)  {
			// decode each field name ready for encoding when it goes through serialization
			// and save each field name into the array
			$this->columnNames[$i] = $this->_directCharsetHandler->transliterate(sqlite_field_name($d, $i));
		}
		$this->numRows = sqlite_num_rows($d);
		$this->serializedData = $ob;
	}
}
?>