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
 * @subpackage app
 */

/**
 * The Service browser header
 */
define("AMFPHP_SERVICE_BROWSER_HEADER", "DescribeService");
/**
 * The Credentials header string
 */
define("AMFPHP_CREDENTIALS_HEADER", "Credentials");
/**
 * The cleared credentials string
 */
define("AMFPHP_CLEARED_CREDENTIALS", "AMFPHP_CLEARED_CREDENTIALS");
/**
 * The Debugging header string
 */
define("AMFPHP_DEBUG_HEADER", "amf_server_debug");
/**
 * The success method name
 */
define("AMFPHP_CLIENT_SUCCESS_METHOD", "/onResult");
/**
 * The status method name
 */
define("AMFPHP_CLIENT_FAILURE_METHOD", "/onStatus");
/**
 * The rewrite header method name
 */
define("AMFPHP_CLIENT_REWRITE_HEADER", "ReplaceGatewayUrl");
/**
 * The Content Type String
 */
define("AMFPHP_CONTENT_TYPE", "Content-type: application/x-amf");

/**
 * 
 * @package flashservices
 * @subpackage app
 * @author Justin Watkins
 * @version $Id: Constants.php,v 1.2 2004/02/29 06:03:33 justinwatkins Exp $
 */
class Constants {
    function getFriendlyError ($err) {
        $errortype = array (1 => "Error",
            2 => "Warning",
            4 => "Parsing Error",
            8 => "Notice",
            16 => "Core Error",
            32 => "Core Warning",
            64 => "Compile Error",
            128 => "Compile Warning",
            256 => "User Error",
            512 => "User Warning",
            1024 => "User Notice"
            );
        return $errortype[$err];
    } 
} 
?>
