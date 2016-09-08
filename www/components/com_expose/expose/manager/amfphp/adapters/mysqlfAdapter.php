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
 * The mysqlf adapter is a filtered mySQL adapter riggged 
 * to only transmit certain column names. Must be typed manually.
 * 
 * @package flashservices
 * @subpackage adapters
 * @version $Id: mysqlfAdapter.php,v 1.1 2005/07/05 07:56:29 pmineault Exp $
 */
class mysqlfAdapter extends RecordSetAdapter {
    /**
     * Constructor method for the adapter.  This constructor implements the setting of the
     * 3 required properties for the object.
     * 
     * @param resource $d The datasource resource
     */
     
    function mysqlfAdapter($d) {
    	
    	$f = $d['filter'];
    	$d = $d['data'];
		parent::RecordSetAdapter($d);
		
		$fieldcount = count($f);
        $truefieldcount = mysql_num_fields($d);
        $be = $this->isBigEndian;
        
        $isintcache = array();
        for($i = 0; $i < $truefieldcount; $i++) {
            //mysql_fetch_* usually returns only strings, 
            //hack it into submission
            $type = mysql_field_type($d, $i);
            $name = mysql_field_name($d, $i);
           	$isintcache[$name] = in_array($type, array('int', 'real', 'year'));
        }

		$isint = array();
        for($i = 0; $i < $fieldcount; $i++) {
            $this->columnNames[$i] = $this->_charsetHandler->transliterate($f[$i]);
            $isint[$i] = isset($isintcache[$f[$i]]) && $isintcache[$f[$i]];
        }

		//Start fast serializing
		$ob = "";
		$fc = pack('N', $fieldcount);
        while ($line = mysql_fetch_assoc($d)) {
			//Write array flag + length
	        $ob .= "\12" . $fc;
	        
			$i = 0;
            foreach($f as $key)
            {
            	$value = $line[$key];
            	if(!$isint[$i]) //type as string
            	{
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
            	else //type as num
            	{
                    $b = pack('d', $value); // pack the bytes
                    if ($be) { // if we are a big-endian processor
                        $r = strrev($b);
                    } else { // add the bytes to the output
                        $r = $b;
                    }
                    $ob .= "\0" . $r; 
            	}
            	$i++;
            }
        }
        
       	$this->numRows = mysql_num_rows($d);
        $this->serializedData = $ob;
    }
}

?>