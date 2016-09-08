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
require_once(AMFPHP_BASE . "adapters/lib/FileReader.php");
require_once(AMFPHP_BASE . "adapters/lib/CSVReader.php");


/**
 * The csv adapter shows how adapters can be used to turn basically anything into a 
 * recordset. Here the adapter expects an associative array such as:
 * 
 * "cols" => array("colname1", "colname2"),
 * "filename" => "fully qualified csv filename"
 *
 * You must set the return type in your service to 
 * "csv recordset"
 *
 * Uses the CSVReader class by Nicolas BUI
 * 
 * @package flashservices
 * @subpackage adapters
 * @version $Id: csvAdapter.php,v 1.1 2005/07/22 10:58:09 pmineault Exp $
 */

class csvAdapter extends RecordSetAdapter
{

	/**
	 * Constructor method for the adapter.  This constructor implements the setting of the
	 * 3 required properties for the object.
	 * 
	 * @param resource $d The datasource resource
	 */
     
	function csvAdapter($d)
	{
		parent::RecordSetAdapter($d);
		
		$this->columnNames = $d['cols'];
		$data = $d['filename'];
		$sep = isset($d['separator']) ? $d['separator'] : ','; 

		$reader = & new CSVReader( new FileReader($data) );
		$reader->setSeparator($sep);
		
		// grab all of the rows
		
		$ob = "";
		
		
		$numlines = 0;
		while( false != ( $cell = $reader->next() ) ) {
			//Write array flag + length
	        $to = count( $cell );
	        $ob .= "\12" . pack('N', $to);;
	        
            for($i = 0; $i < $to; $i++)
            { //Type everything as a string since this is csv
            	$value = $cell[$i];
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
            $numlines++;
		}
		
		$this->numRows = $numlines;
		$this->serializedData = $ob;
	}
}
?>