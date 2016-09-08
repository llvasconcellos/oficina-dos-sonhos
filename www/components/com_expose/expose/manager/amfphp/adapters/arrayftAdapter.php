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
 * The arrayft adapter is a filtered mySQL adapter riggged 
 * to only transmit certain column names. Must be typed manually.
 * 
 * @package flashservices
 * @subpackage adapters
 * @version $Id: mysqlfAdapter.php,v 1.1 2005/07/05 07:56:29 pmineault Exp $
 */
class arrayftAdapter extends RecordSetAdapter {
    /**
     * Constructor method for the adapter.  This constructor implements the setting of the
     * 3 required properties for the object.
     * 
     * @param resource $d The datasource resource
     */
     
    function arrayftAdapter($d) {
    	
    	$f = $d->filter;
    	$t = $d->types;
    	$d = $d->data;
    	
    	if($t == NULL)
    	{
    		$t = str_repeat('s', count($f));
    	}
    	
		parent::RecordSetAdapter($d);

		$fieldcount = count($f);
        $be = $this->isBigEndian;
        
        $this->columnNames = $f;

		//Start fast serializing
		$ob = "";
		$fc = pack('N', $fieldcount);
		
		if(count($d) > 0)
		{
			$line = $d[0];
	        do {
				//Write array flag + length
		        $ob .= "\12" . $fc;
		        
				$i = 0;
	            foreach($f as $key)
	            {
	            	$value = $line[$key];
	            	if($t[$i] == 'd') //type as num
	            	{
	                    $b = pack('d', $value); // pack the bytes
	                    if ($be) { // if we are a big-endian processor
	                        $r = strrev($b);
	                    } else { // add the bytes to the output
	                        $r = $b;
	                    }
	                    $ob .= "\0" . $r; 
	            	}
	            	else
	            	{
			            $os = $this->_directCharsetHandler->transliterate($value);
						//string flag, string length, and string
				        $ob .= "\2" . pack('n', strlen($os)). $os;
	            	}
	            	$i++;
	            }
	        } while($line = next($d));
		}
        
       	$this->numRows = count($d);
        $this->serializedData = $ob;
    }
}

?>