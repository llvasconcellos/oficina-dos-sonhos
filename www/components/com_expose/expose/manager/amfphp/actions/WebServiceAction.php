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
 * @subpackage actions
 */
/**
 * Require the super class
 */
/**
 * 
 * @package flashservices
 * @subpackage actions
 * @version $Id: WebServiceAction.php,v 1.11 2005/07/05 07:40:49 pmineault Exp $
 */
class WebServiceAction {
	var $internalName = "WebServiceAction";
    var $_method = 'php5';
    var $bodyObj;

    /**
     * invokeFilter is an abstract method that must the subclass must override.
     * 
     * @param AMFWrapper $ The AMFWrapper object to pass along the filters
     */
    function doAction (&$amfobject) {
        $localRef = &$amfobject;
		$this->bodyObj = &$amfobject;
        if ($localRef->isWebService()) {
            $args = &$localRef->getValue();
            $this->_webServiceURI = $localRef->getClassPath();
            $this->_webServiceMethod = $localRef->getMethodName();
            $this->_phpInternalEncoding = CharsetHandler::getPhpCharset();
            $results = $this->consumeWebService($args);
            if($results != 'error')
            {
            	$localRef->setResults($results);
            }
        }
        return true;
    } 

    /**
     * negotiates whether the PEAR SOAP is installed, if not then if nuSOAP is installed.
     * 
     * @param array $a The arguments object to pass through
     * @return mixed The results of the web service call
     */
    function consumeWebService($a) {
    	if($this->_method == 'php5')
    	{
    		$result = $this->php5SoapImpl($a);
    	}
        else if ($this->_method == 'pear') { // don't load PEAR::SOAP if it's not wanted.
            // There are also name space conflicts between the 2 packages.
            return $this->pearSoapImpl($a); // run the pear implementation
        } else {
        	$result = $this->nuSoapImpl($a);
            return $result; // run the nuSoap implementation
        }
        return $result;
    } 

    /**
     * The nuSoap client implementation
     * 
     * @return mixed The web service results
     */
    function nuSoapImpl($a) {
        $this->_nusoapInstalled = @include_once(AMFPHP_BASE . "lib/nusoap.php");
        if ($this->_nusoapInstalled) {
            $soapclient = new soapclient($this->_webServiceURI, 'wsdl'); // create a instance of the SOAP client object
            $soapclient->soap_defencoding = $this->_phpInternalEncoding;
            if (count($a) == 1 && is_array($a)) {
                $result = $soapclient->call($this->_webServiceMethod, $a[0]); // execute without the proxy
            } else {
                $proxy = $soapclient->getProxy();
                //
                $result = call_user_func_array(array($proxy, $this->_webServiceMethod), $a);
            } 
            //echo $soapclient->getDebug();
            return $result;
        } else {
            trigger_error("You must install a soap package, both PEAR::SOAP and nuSOAP are supported", E_USER_ERROR);
        } 
    } 

    /**
     * The PEAR::SOAP client implementation
     * 
     * @return mixed The web service results
     */
    function pearSOAPImpl($a) {
        $this->_pearInstalled = @include_once "SOAP/Client.php"; // load the PEAR::SOAP implementation
        if ($this->_pearInstalled) {
            $client = new SOAP_Client($this->_webServiceURI);
            $response = $client->call($this->_webServiceMethod, $a[0]);
            return $response;
        } else {
            $this->_usePear = false;
            $this->nuSoapImpl($a);
        } 
    } 
    
    /**
     * 
     */
    function php5SoapImpl($a)
    {
    	//Note that encoding is set to php internal encoding,
    	//As SoapClient always sends and receives stuff in UTF-8 anyway
    	$client = new SoapClient($this->_webServiceURI, array("exceptions" => 0, "trace" => 1, "encoding" => $this->_phpInternalEncoding));
    	$response = $client->__soapCall($this->_webServiceMethod, $a[0]);
    	if(is_soap_fault($response))
    	{
            $ex = new AMFException(E_USER_ERROR, array($response, $client->__getLastRequest(), $client->__getLastResponse()), __FILE__, __LINE__);
            AMFException::throwException($this->bodyObj, $ex);
            return 'error';
    	}
	   	return $response;
    }
} 

?>