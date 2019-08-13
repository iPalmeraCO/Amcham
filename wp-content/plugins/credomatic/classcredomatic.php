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
		'IPAddress' => '',
		'MerchantId' => $this->facId,
		'OrderNumber' =>
		$this->orderNumber,
		'Signature' => $signature,
		'SignatureMethod' => 'SHA1',
		'TransactionCode' => '0');
		// The request data is named 'Request' for reasons that are not clear!
		$AuthorizeRequest = array('Request' => array('CardDetails' => $CardDetails,
		'TransactionDetails' => $TransactionDetails));
		// For debug, to check the values are OK
		//var_dump($AuthorizeRequest);
		// Call the Authorize through the Client
		$result = $client->Authorize($AuthorizeRequest);


		if ($result->AuthorizeResult->CreditCardTransactionResults->OriginalResponseCode == "00"){
			$referencenumber = $result->AuthorizeResult->CreditCardTransactionResults->ReferenceNumber;
			return $referencenumber;
		}else {
			$this->errors = $result->AuthorizeResult->CreditCardTransactionResults->OriginalResponseCode;
			return -1;
		}

		
	}

	function geterrors(){
		return $this->errors;
	}
} 

?>