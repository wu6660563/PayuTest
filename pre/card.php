<?php
require_once '../payulib/PayU.php';

PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
PayU::$merchantId = "500238";
PayU::$apiLogin = "11959c415b33d0c";
PayU::$language = SupportedLanguages::ES;



PayU::$isTest = true;
Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
// Queries URL
Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
// Subscriptions for recurring payments URL
Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");

$parameters = array(
		PayUParameters::ACCOUNT_ID => "500538",

		PayUParameters::REFERENCE_CODE => "comprame_test_10000055",
		PayUParameters::DESCRIPTION => "Comprame Test",

		PayUParameters::VALUE => "10000",
		PayUParameters::CURRENCY => "COP",

		//payer
		PayUParameters::PAYER_NAME => "APPROVED", // To get and approve transaction you must to send APPROVED
		PayUParameters::PAYER_ID => "10",
		PayUParameters::BUYER_EMAIL => "nick@comprame.com",
		PayUParameters::BUYER_CONTACT_PHONE => "7563126",
		PayUParameters::PAYER_DNI => "5415668464654",
		PayUParameters::PAYMENT_METHOD => PaymentMethods::VISA,

		PayUParameters::CREDIT_CARD_NUMBER => "4111111111111111",
		PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2016/12",
		PayUParameters::CREDIT_CARD_SECURITY_CODE=> "123",

		//buyer address
		PayUParameters::BUYER_STREET => "calle 100",
		PayUParameters::BUYER_STREET_2 => "5555487",
		PayUParameters::BUYER_CITY => "Medellin",
		PayUParameters::BUYER_STATE => "Antioquia",
		PayUParameters::BUYER_COUNTRY => "CO",
		PayUParameters::BUYER_POSTAL_CODE => "000000",
		PayUParameters::BUYER_PHONE => "7563126",

		// Enter the number of installments here.
		PayUParameters::INSTALLMENTS_NUMBER => "1",
		// Enter the name of the country here.
		PayUParameters::COUNTRY => PayUCountries::CO,
		//Session id del device.
		PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
		// Payer IP
		PayUParameters::IP_ADDRESS => "127.0.0.1",
		// Cookie of the current session.
		PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
		// User agent of the current session.
		//firefox agent
		PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
);


$response = PayUPayments::doAuthorizationAndCapture($parameters);

if ($response) {
	echo "orderId:".$response->transactionResponse->orderId ."<br>";
	echo "transactionId:".$response->transactionResponse->transactionId ."<br>";
	echo "state:".$response->transactionResponse->state ."<br>";
	var_dump($response->transactionResponse);
}