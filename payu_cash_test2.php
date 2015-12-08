<?php

/**
 * 信用卡方式
 * Payu测试代码编码
 * 1、信用卡，获取令牌Token
 * 2、根据令牌Token支付订单
 * 
 * @author nick
 * @since 2015/10/15
 */

//引入Payu库
require_once 'payulib/PayU.php';

PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
PayU::$merchantId = "500238";
PayU::$apiLogin = "11959c415b33d0c";
PayU::$language = SupportedLanguages::ES;
PayU::$isTest = false;	//cash payment , istest must set false

Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
// Queries URL
Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
// Subscriptions for recurring payments URL
Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");

$parameters = array(
		PayUParameters::ACCOUNT_ID => "500538",
		
		PayUParameters::REFERENCE_CODE => "comprame_test_10000072",
		PayUParameters::DESCRIPTION => "Comprame Test",
		
		// -- Values --		      
		PayUParameters::VALUE => "20000",
		PayUParameters::TAX_VALUE => "0",
		PayUParameters::CURRENCY => "COP",
		PayUParameters::PAYMENT_METHOD => PaymentMethods::BALOTO, //EFECTY or BALOTO
		PayUParameters::EXPIRATION_DATE => date("Y-m-d\TH:i:s",strtotime("+7 days")), //Max 7 days
		PayUParameters::PAYER_NAME => "nickwu",
		PayUParameters::PAYER_ID => '0',
		PayUParameters::PAYER_EMAIL=> "nick@comprame.com",
		PayUParameters::PAYER_DNI => '1111111111111',
		
		//buyer address
		PayUParameters::BUYER_STREET => "test",
		PayUParameters::BUYER_STREET_2 => "",
		PayUParameters::BUYER_CITY => "test",
		PayUParameters::BUYER_STATE => "test",
		PayUParameters::BUYER_COUNTRY => "CO",
		// 		PayUParameters::BUYER_POSTAL_CODE => "000000",
		PayUParameters::BUYER_PHONE => "13211113333",
		PayUParameters::BUYER_NAME => 'nickwu',
		PayUParameters::BUYER_ID => '0',
		PayUParameters::BUYER_EMAIL => "nick@comprame.com",
		
		// Enter the name of the country here.
		PayUParameters::COUNTRY => PayUCountries::CO,
		//Enter the expiration date here.
		// Payer IP
		PayUParameters::IP_ADDRESS => "127.0.0.1", 
		PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
		PayUParameters::DEVICE_SESSION_ID => '123456789',
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
// 	echo "paymentNetworkResponseCode:".$response->transactionResponse->paymentNetworkResponseCode ."<br>";
// 	echo "paymentNetworkResponseErrorMessage:".$response->transactionResponse->paymentNetworkResponseErrorMessage ."<br>";
// 	echo "trazabilityCode:".$response->transactionResponse->trazabilityCode ."<br>";
	echo "responseCode:".$response->transactionResponse->responseCode ."<br>";
// 	echo "responseMessage:".$response->transactionResponse->responseMessage ."<br>";
	var_dump($response->transactionResponse);
}


