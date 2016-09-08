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
 * @subpackage debug
 */

/**
 * HttpHeaders. Debug event subclass to cope with the http headers
 * debug request.
 * 
 * @package flashservices
 * @subpackage debug
 * @author Justin Watkins
 * @version $Id: HttpHeaders.php,v 1.4 2005/07/05 07:40:51 pmineault Exp $
 */
class HttpHeaders {
    /**
     * The constructor function for a new httpheaders subclass.
     * 
     * Sets out the table of data for the debug event
     * (the format of this table is not definitely the correct format!!)
     */
    function HttpHeaders() {
        $this->EventType = "HTTPRequestHeaders";
        $this->Time = time();
        $this->Source = "Server";
        $this->HttpHeaders = array("User-Agent" => $_SERVER["HTTP_USER_AGENT"],
            "Cache-Control" => "no-cache",
            "User-Agent" => "Shockwave Flash",
            "x-flash-version" => "7,0,19,0",
            "Cookie" => $this->getCookies(),
            "Content-type" => "Content-type: " . AMFPHP_CONTENT_TYPE,
            "Host" => $_SERVER["HTTP_HOST"],
            "Referer" => $_SERVER["HTTP_REFERER"],
            "DocumentRoot" => $_SERVER['DOCUMENT_ROOT'],
            "GatewayInterface" => $_SERVER['GATEWAY_INTERFACE'],
            "PathTranslated" => $_SERVER['PATH_TRANSLATED'],
            "PHPSelf" => $_SERVER['PHP_SELF'],
            "RequestMethod" => $_SERVER['REQUEST_METHOD'],
            "RequestURI" => $_SERVER['REQUEST_URI'],
            "ServerProtocol" => $_SERVER['SERVER_PROTOCOL'],
            "ServerSoftware" => $_SERVER['SERVER_SOFTWARE'],
            "Content-Length" => $_SERVER["CONTENT_LENGTH"]
            );
        $this->Date = array(date("D M j G:i:s T O Y"));
        unset($this->_data);
    } 
    /**
     * Returns the cookie IDs as a string.
     * 
     * @return string All cookie IDs
     */
    function getCookies() {
        $cookies = "";
        foreach($_COOKIE as $key => $value) {
            $cookies .= $key . "=" . $value . "; ";
        }
        return $cookies;
    } 
} 

?>