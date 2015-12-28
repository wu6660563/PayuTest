<?php
/**
 * query payu's orderId
 */
require_once 'payulib/PayU.php';

// PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
// PayU::$merchantId = "500238";
// PayU::$apiLogin = "11959c415b33d0c";

PayU::$apiKey = "2abqui9uo35c2r1qt8mugjql2b";
PayU::$merchantId = "508529";
PayU::$apiLogin = "66cf39423a4416c";
PayU::$language = SupportedLanguages::ES;
PayU::$isTest = false;

$startTime = date('Y-m-d H:i:s');

// Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
// // Queries URL
// Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
// // Subscriptions for recurring payments URL
// Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");


Environment::setPaymentsCustomUrl("https://api.payulatam.com/payments-api/4.0/service.cgi");
// Queries URL
Environment::setReportsCustomUrl("https://api.payulatam.com/reports-api/4.0/service.cgi");
// Subscriptions for recurring payments URL
Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.3/");

$transaction_id = 'afd826c9-1825-436e-ba7c-09010848ef51';

$parameters = array(PayUParameters::TRANSACTION_ID => $transaction_id);

$response = PayUReports::getTransactionResponse($parameters);


//query by ReferenceCode
// $order = PayUReports::getOrderDetailByReferenceCode($parameters);

//query by TRANSACTION_ID,must set TRANSACTION_ID
// $order = PayUReports::getTransactionResponse($parameters);

if ($response) {
	var_dump($response);
	
	$endTime = date("Y-m-d H:i:s");
	$content = 'startTime:'.$startTime.'-----endTime:'.$endTime.PHP_EOL;
	$content .= json_encode($response).PHP_EOL;
	
	$handle = fopen('logs/queryTransactionId.php', "a+");
	$str = fwrite($handle, $content);
	fclose($handle);
} else {
	echo 'ERROR';
}



