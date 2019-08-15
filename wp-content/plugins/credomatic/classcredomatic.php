<?php 
class credomatic { 
	public $facId; //FAC Id
    public $password; //Processing Password    
    public $acquirerId; //Adquire Id
    public $currency;
    public $wsdlurl; //Url web service
    public $orderNumber;
    public $errors;


    function __construct() {
       $this->wsdlurl = 'https://ecm.firstatlanticcommerce.com/PGService/Services.svc?wsdl';
       $this->facId = '88801091';
       $this->acquirerId = '464748';
       $this->password = 'Ioq0N5L2';
       $this->currency = '320';
   }
  
	// How to sign a FAC Authorize message
	function Sign($amount)
	{
		$orderNumber = 'FACPGTEST' . (string)round(microtime(1) * 1000);
		$this->orderNumber = $orderNumber;
		$stringtohash = $this->password.$this->facId.$this->acquirerId.$orderNumber.$amount.$this->currency;
		$hash = sha1($stringtohash, true);
		$signature = base64_encode($hash);
		return $signature;
	}

	function formatamount($amount){
		$amount= str_replace(".", "", $amount);
		$amount = str_pad($amount, 12, "0", STR_PAD_LEFT); 
		return $amount;
	}

	function processtransaction($expiratedate, $cardnumber,$amount,$cvv){
		$amount = self::formatamount($amount);

		$options = array(
		'location' => $this->wsdlurl,
		'soap_version'=>SOAP_1_1,
		'exceptions'=>0,
		'trace'=>1,
		'cache_wsdl'=>WSDL_CACHE_NONE
		);
	
		$client = new SoapClient($this->wsdlurl , $options);

		$signature  = self::Sign($amount);
		$CardDetails = array('CardCVV2' => $cvv,
		'CardExpiryDate' => $expiratedate,
		'CardNumber' => $cardnumber,
		'IssueNumber' => '',
		'StartDate' => '');
		// Transaction Details.
		$TransactionDetails = array('AcquirerId' => $this->acquirerId,
		'Amount' => $amount,
		'Currency' => $this->currency,
		'CurrencyExponent' => 2,
		'IPAddress' => $this->getUserIP(),
		'MerchantId' => $this->facId,
		'OrderNumber' =>
		$this->orderNumber,
		'Signature' => $signature,
		'SignatureMethod' => 'SHA1',
		'TransactionCode' => '0');
		
		$AuthorizeRequest = array('Request' => array('CardDetails' => $CardDetails,
		'TransactionDetails' => $TransactionDetails));
		
		$result = $client->Authorize($AuthorizeRequest);


		if ($result->AuthorizeResult->CreditCardTransactionResults->ResponseCode == "1" && $result->AuthorizeResult->CreditCardTransactionResults->ReasonCode == "1" &&  $result->AuthorizeResult->CreditCardTransactionResults->ReasonCodeDescription == "Transaction is approved."){
			$referencenumber = $result->AuthorizeResult->CreditCardTransactionResults->ReferenceNumber;

			$capture = $this->captureorrefund($amount, $this->orderNumber,1);
			if ($capture->TransactionModificationResult->ResponseCode == 1 && $capture->TransactionModificationResult->ReasonCode == 1101 && $capture->TransactionModificationResult->ReasonCodeDescription == "Transaction successful"){
				$refund = $this->captureorrefund($amount, $this->orderNumber,2);
				if ($refund->TransactionModificationResult->ResponseCode == 1 && $refund->TransactionModificationResult->ReasonCode == 1101 && $refund->TransactionModificationResult->ReasonCodeDescription == "Transaction successful"){
					return $referencenumber;
				} else {
					$this->errors = "Error al desembolsar";
				}
			} else {
					$this->errors = "Error al capturar";
			}
			
		}else {
			$error = "ResponseCode:".$result->AuthorizeResult->CreditCardTransactionResults->ResponseCode." ReasonCode: ".$result->AuthorizeResult->CreditCardTransactionResults->ReasonCode. " ReasonCodeDescription ".$result->AuthorizeResult->CreditCardTransactionResults->ReasonCodeDescription;
			$this->errors = $error;
			return -1;
		}

		
	}

	/**
	Type: 1 Catpure
		  2 Refund
	*/
	function captureorrefund($amount,$orderNumber, $type){
		$options = array(
		'location' => $this->wsdlurl,
		'soap_version'=>SOAP_1_1,
		'exceptions'=>0,
		'trace'=>1,
		'cache_wsdl'=>WSDL_CACHE_NONE
		);
	
		$client = new SoapClient($this->wsdlurl , $options);

		$datos = array(
			'Request'=>
				array(
				'AcquirerId' => $this->acquirerId,
				'Amount' => $amount,
				'CurrencyExponent' => 2,
				'MerchantId' => $this->facId,
				'ModificationType' => $type,
				'OrderNumber' => $orderNumber,
				'Password' =>$this->password)
		);

		$result = $client->TransactionModification($datos);

		return $result;
	}




	function geterrors(){
		return $this->errors;
	}

	function getUserIP() {
	    $ipaddress = '';
		    if (isset($_SERVER['HTTP_CLIENT_IP']))
		        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
		        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
		    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED'];
		    else if(isset($_SERVER['REMOTE_ADDR']))
		        $ipaddress = $_SERVER['REMOTE_ADDR'];
		    else
		        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
		}
} 

?>