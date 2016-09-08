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
 * The SessionManager is a static class designed to abstract the implementation
 * for starting and testing whether a session has been initialized.
 * 
 * @package flashservices
 * @subpackage util
 * @version $Id: SessionManager.php,v 1.3 2004/12/13 01:07:19 pmineault Exp $
 */
class SessionManager {
    /**
     * startSession is the implementation for starting the php session and storing a session key
     * stating the session was initialized.
     *
     * @return string The session id for the users session.
     */
    function startSession () {
        if (! SessionManager::isSessionStarted()) {
            session_start();
            $_SESSION['amfphp_session_inited'] = true;
        }
        return session_id();
    }

    /**
     * isSessionStarted is the implementation to check to see if a session has been initialized.
     *
     * @return boolean Whether the session is started.
     */
    function isSessionStarted () {
        if (isset($_SESSION['amfphp_session_inited']) && $_SESSION['amfphp_session_inited']) {
            return true;
        }
        return false;
    }
}

?>