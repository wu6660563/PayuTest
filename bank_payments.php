<?php
require_once 'payulib/PayU.php';

PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
PayU::$merchantId = "500238";
PayU::$apiLogin = "11959c415b33d0c";
PayU::$language = SupportedLanguages::ES;
PayU::$isTest = false;

Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
// Queries URL
Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
// Subscriptions for recurring payments URL
Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");

//---------------get order by order_test.php--------------------------
$filename = 'createOrderId.php';
$handle = fopen($filename, "r");
$order_id = fread($handle, filesize ($filename));
fclose($handle);
 
$netOrder = $order_id + 1;
file_put_contents($filename, $netOrder);	//orderid = orderid + 1 in order_test.php
//---------------get order by order_test.php--------------------------

$parameters = array(
		PayUParameters::ACCOUNT_ID => "500538",
		
		PayUParameters::REFERENCE_CODE => "comprame_test_10000089",
		PayUParameters::DESCRIPTION => "Comprame Test",
		
		// -- Values --		      
		PayUParameters::VALUE => "20000",
		PayUParameters::CURRENCY => "COP",
		
		//buyer address
		PayUParameters::BUYER_STREET => "calle 100",
		PayUParameters::BUYER_STREET_2 => "5555487",
		PayUParameters::BUYER_CITY => "Medellin",
		PayUParameters::BUYER_STATE => "Antioquia",
		PayUParameters::BUYER_COUNTRY => "CO",
		// 		PayUParameters::BUYER_POSTAL_CODE => "000000",
		PayUParameters::BUYER_PHONE => "7563126",
					
		PayUParameters::BUYER_EMAIL => "nick@comprame.com",	
		PayUParameters::PAYER_NAME => "11111111111111111",
		PayUParameters::PAYER_DNI=> "5415668464654",		
		PayUParameters::PAYMENT_METHOD => PaymentMethods::BANK_REFERENCED, //BANK_REFERENCED
		
		// Enter the name of the country here.
		PayUParameters::COUNTRY => PayUCountries::CO,
		//Enter the expiration date here.
		PayUParameters::EXPIRATION_DATE => "2015-12-01T00:00:00", //Max 7 days
		// Payer IP
		PayUParameters::IP_ADDRESS => "127.0.0.1", 
		PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
		// User agent of the current session.
		PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
);

$response = PayUPayments::doAuthorizationAndCapture($parameters);

if ($response) {
	echo "orderId:".$response->transactionResponse->orderId ."<br>";
	echo "transactionId:".$response->transactionResponse->transactionId ."<br>";
	echo "state:".$response->transactionResponse->state ."<br>";
	if ($response->transactionResponse->state=="PENDING") {
		echo "pendingReason:".$response->transactionResponse->pendingReason ."<br>";
	}
	echo "responseCode:".$response->transactionResponse->responseCode ."<br>";
	var_dump($response->transactionResponse);
	var_dump($response);
	
}
