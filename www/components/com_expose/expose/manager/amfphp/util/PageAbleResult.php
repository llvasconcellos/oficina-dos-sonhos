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
 * @subpackage sql
 */
/**
 * PageAbleResult is an AMFPHP service class which is used internally by AMFPHP
 * to provide support for pageable recordsets. The methods of PageAbleResult
 * are called automatically by the Flash player when implementing pageable
 * recordsets. To use pageable recordsets the developer need only
 * include the pagesize value in the service class method table and use
 * setDeliveryMode in the Flash client.
 * 
 * @package flashservices
 * @subpackage sql
 * @version $Id: PageAbleResult.php,v 1.2 2005/07/05 07:40:53 pmineault Exp $
 */

class PageAbleResult {
    /**
     * Constructor function.
     * 
     * Contains the methodTable data and sets getRecords to return a record set page
     * instead of a normal array.
     */
    function PageAbleResult() {
        $this->methodTable = array("getRecords" => array("access" => "remote",
                "returns" => "__RECORDSETPAGE__"
                ),
            "release" => array("access" => "remote"
                )
            );
    } 
    /**
     * Collects the page of the recordset from the session and returns it along
     * with the cursor position of the first record.
     * 
     * @param string $id The session id
     * @param int $c The cursor position
     * @param int $ps The page size
     * @return array Contains the cursor position of the first record and the page data
     */
    function getRecords($id, $c, $ps) {
        $keys = explode("=", $id);
        $currset = intval($keys[1]);
        session_id($keys[0]);
        session_start();
        $pageData = array();
        $pageData['Cursor'] = $c;
        $pageData['Page'] = array_slice($_SESSION['amfphp_recordsets'][$currset]['data'], $c - 1, $ps);

        for($i = 0; $i < $ps; $i++)
        {
            $_SESSION['amfphp_recordsets'][$currset]['indexes'][$c + $i] = true;
        }
        return $pageData;
    } 
    /**
     * Unsets the recordset data from the session
     * Flash, for some reason does not give back the recordid, so it's  difficult to see
     * what exactly is going on, this is why we store sent data in another session var
     *
     */
    function release() {
    	if(!session_id())
        {
    	    session_start();
        }

    	foreach($_SESSION['amfphp_recordsets'] as $key => $value)
    	{
            $found = false;
            foreach($value['indexes'] as $recordid => $recordsent)
            {
                if(!$recordsent)
                {
                    $found = true;
                    break;
                }
            }
            if(!$found)
            {
                //Release recordset
                unset($_SESSION['amfphp_recordsets'][$key]);
            }
    	}
        return;
    } 
} 

?>