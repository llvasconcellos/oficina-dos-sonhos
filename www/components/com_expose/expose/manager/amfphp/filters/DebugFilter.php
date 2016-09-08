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
 * @subpackage filters
 */

/**
 * required files
 */ 
require_once(AMFPHP_BASE . "debug/HttpHeaders.php");
require_once(AMFPHP_BASE . "debug/AMFRequestHeaders.php");
require_once(AMFPHP_BASE . "debug/AMFResponseHeaders.php");
require_once(AMFPHP_BASE . "debug/AMFMethodCall.php");
require_once(AMFPHP_BASE . "debug/TraceHeader.php");

/**
 * DebugFilter gathers all of the debugging information and wraps it into 
 * the AMFObject as a series of AMFBody elements.
 * 
 * @package flashservices
 * @subpackage filters
 * @version $Id: DebugFilter.php,v 1.9 2005/07/05 07:40:51 pmineault Exp $
 */
class DebugFilter {
	var $internalName = "DebugFilter";
	var $disableTrace = false;
	var $disableDebug = false;
    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
     
    function invokeFilter (&$amf) {
    	//FlashComm doesn't understand debugging
    	if(IS_FLASH_COMM)
    	{
    		return;
    	}
        $localRef = &$amf; // save a copy of the amf object
        
        $body = &$localRef->getBodyAt($localRef->numBody() - 1);
        $index = $body->getResponseIndex();
        $debugHeader = &$localRef->getHeader(AMFPHP_DEBUG_HEADER); // grab the debug header
        
        if (!$this->disableDebug && $debugHeader !== false) { // if there is a debug header
            $value = &$debugHeader->getValue(); // grab the value of the header
            $headers = new AMFBody(); // create a new amf body
            $headers->setIsDebug(true); // flag this as a debugging message so we don't duplicate it
            $headers->setResponseIndex($index); // set the response index of this message
            $headers->setResponseURI("/onDebugEvents"); // set the response uri of this body
            $headers->setIgnoreExecution(true); // set the ignore execution flag
            $headerresults = array(); // create a result array
            $headerresults[0] = array(); // create a sub array in results (CF seems to do this, don't know why)
            if ($value["httpheaders"]) { // if the client wants http headers
                $headerresults[0][] = new HttpHeaders(); // send them back
            } 
            if ($value["amfheaders"]) { // if the client wants amf headers
                $c = $localRef->numHeader(); // grab the count of headers
                for ($i = 0; $i < $c; $i++) { // loop over each header
                    $header = &$localRef->getHeaderAt($i); // grab the actual header
                    $headerresults[0][] = new AMFRequestHeaders($header); // return a new header object
                } 
            } 
            //Check if there is any trace action required
	        if(!$this->disableTrace && $value['trace'] && count(NetDebug::getTraceStack()) != 0)
	        {
	        	$ts = NetDebug::getTraceStack();
	           	$headerresults[0][] = new TraceHeader($ts);
	        }
            $headers->setResults($headerresults); // set the results.
            $localRef->addBodyAt(0, $headers);

            if ($value["amf"]) { // if the client wants to see the amf data
                $c = $localRef->numBody(); // grab the number of requests
                for ($i = $c - 1; $i >= 0; $i--) { // loop over each body message
                    $body = &$localRef->getBodyAt($i); // grab the body
                    if (!$body->getIgnoreResults() && !$body->getIsDebug()) {
                        $amfcalls = new AMFBody(); // create a new amf body
                        $amfcalls->setResponseIndex($body->getResponseIndex()); // set the response index of this message
                        $amfcalls->setResponseURI("/onDebugEvents"); // set the response uri of this body
                        $amfcalls->setIsDebug(true);
                        $amfcalls->setIgnoreExecution(true);
                        $amfcalls->setResults(array(array(new AMFMethodCall($body))));
                        $localRef->addBodyAt(0, $amfcalls);
                        $i++;
                        $c++;
                    } 
                } 
            } 

            if ($value["amfheaders"]) { // if the client wants amf headers
                $responseheaders = new AMFBody(); // create a new amf body
                $responseheaders->setResponseIndex($index); // set the response index of this message
                $responseheaders->setIsDebug(true);
                $responseheaders->setResponseURI("/onDebugEvents"); // set the response uri of this body
                $responseresults = array(); // create a result array
                $responseresults[0] = array(); // create a sub array in results (CF seems to do this, don't know why)
                $c = $localRef->numOutgoingHeader(); // grab the count of headers
                for ($i = 0; $i < $c; $i++) { // loop over each header
                    $header = &$localRef->getOutgoingHeaderAt($i); // grab the actual header
                    $responseresults[0][] = new AMFResponseHeaders($header); // return a new header object
                } 
                $responseheaders->setResults($responseresults); // set the results.
                $localRef->addBodyAt(0, $responseheaders);
            } 
        }
        else
        {
        	//Always add trace anyway
	        if(!$this->disableTrace && count(NetDebug::getTraceStack()) != 0)
	        {
	        	$headers = new AMFBody(); // create a new amf body
	            $headers->setIsDebug(true); // flag this as a debugging message so we don't duplicate it
	            $headers->setResponseIndex($index); // set the response index of this message
	            $headers->setResponseURI("/onDebugEvents"); // set the response uri of this body
	            $headers->setIgnoreExecution(true); // set the ignore execution flag
                $headerresults = array(); // create a result array
                $headerresults[0] = array(); // create a sub array in results (CF seems to do this, don't know why)
                
	        	$ts = NetDebug::getTraceStack();
	           	$headerresults[0][] = new TraceHeader($ts);
	           	
	            $headers->setResults($headerresults); // set the results.
	            $localRef->addBodyAt(0, $headers);
	        }
        }
    } 
} 

?>