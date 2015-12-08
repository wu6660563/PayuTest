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

$reference = "comprame_test_10000169";
$value = "10000";

$parameters = array(
	//Enter here the ID of the account.
	PayUParameters::ACCOUNT_ID => "500538",
	//Enter here the reference code.
	PayUParameters::REFERENCE_CODE => $reference,
	//Enter description here.
	PayUParameters::DESCRIPTION => "payment test",
	
	// -- Values --
	//Enter the value here.     
	PayUParameters::VALUE => $value,
	//Enter the currency here.
	PayUParameters::CURRENCY => "COP",
	
	//Enter here the email address of the buyer.
	PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
	//Enter here the name of the payer.
	PayUParameters::PAYER_NAME => "First name and second buyer  name",
	//Enter here the email address of the payer.
	PayUParameters::PAYER_EMAIL => "payer_test@test.com",
	//Enter here the telephone number of the payer.
	PayUParameters::PAYER_CONTACT_PHONE=> "7563126",
		   
	// -- PSE --
	//just this code 1051/1022/1001/1013/1099/1012/1055 can return success
	//"BANCO AGRARIO","pseCode":"1040"/		"BANCO CAJA SOCIAL","pseCode":"1032"/		"BANCO CAJA SOCIAL DESARROLLO","pseCode":"1132"/
	//"BANCO COLPATRIA DESARROLLO","pseCode":"1019"/		"BANCO COLPATRIA UAT","pseCode":"1078"/		"BANCO COMERCIAL AVVILLAS S.A.","pseCode":"1052"
	//"BANCO COOPERATIVO COOPCENTRAL","pseCode":"1016"/		"BANCO DAVIVIENDA","pseCode":"1051"/		"BANCO DAVIVIENDA Desarrollo","pseCode":"10512"
	//"BANCO DE BOGOTA 3.0","pseCode":"8888"		"BANCO DE BOGOTA DESARROLLO 2013","pseCode":"1001"		"BANCO DE BOGOTA PRUEBAS 3.0","pseCode":"3333"
	//"BANCO DE BOGOTA PRUEBAS 3.0","pseCode":"1037"	"BANCO DE OCCIDENTE","pseCode":"1023"	"BANCO GNB COLOMBIA (ANTES HSBC)","pseCode":"1010"	"BANCO POPULAR","pseCode":"1002"
	//"BANCO POPULAR WSE 3.0","pseCode":"10029"		"BANCOLOMBIA DATAPOWER","pseCode":"10072"		"BANCOLOMBIA DESARROLLO","pseCode":"10071"
	//"BANCOLOMBIA QA","pseCode":"1007"		"BBVA COLOMBIA S.A.","pseCode":"1013"	Banco Coomeva S.A., Bancoomeva","pseCode":"1061"
	//"Banco Corpbanca","pseCode":"1006"	"Banco Corpbanca (Migracion)","pseCode":"1099"		"Banco Falabella","pseCode":"1062"
	//"Banco GNB Sudameris","pseCode":"1012"	"Banco Mis Ahorritos","pseCode":"1077"		"Banco PSE","pseCode":"1101"	"Banco Pichincha S.A ","pseCode":"1060"		
	//"Banco Tequendama","pseCode":"1035"		"Banco Union Colombiano","pseCode":"1022"	"Banco Web Service ACH","pseCode":"1055"	"Banco Web Service ACH WSE 3.0","pseCode":"3155"
	//"Banco de Prueba Proyecto Antifraude","pseCode":"1010"	"Citibank Colombia S.A.","pseCode":"1009"	"HELM BANK S.A. WSE 3.0","pseCode":"1014"	"HELM BANK S.A...","pseCode":"1098"
	//"Proyecto antifraude- entidad financiera ","pseCode":"1011"
	PayUParameters::PSE_FINANCIAL_INSTITUTION_CODE => "1022",
	//person type
	PayUParameters::PAYER_PERSON_TYPE => "N",
	//idcard
	PayUParameters::PAYER_DNI => "123456789",
	//idcard's type -----CC，CE，NIT，TI，PP，IDC，CEL，RC，DE。
	PayUParameters::PAYER_DOCUMENT_TYPE => "CC",

	//payment method
	PayUParameters::PAYMENT_METHOD => PaymentMethods::PSE,
   
	//country 
	PayUParameters::COUNTRY => PayUCountries::CO,
	
	//IP 
	PayUParameters::IP_ADDRESS => "127.0.0.1",
	//Cookie .
	PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
	//Agent        
	PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0",
	
	//response's url
	PayUParameters::RESPONSE_URL=>"http://www.test.com/response"
	
);
	
$response = PayUPayments::doAuthorizationAndCapture($parameters);

if($response){
	echo "orderId:".$response->transactionResponse->orderId ."<br>";
	echo "transactionId:".$response->transactionResponse->transactionId ."<br>";
	echo "state:".$response->transactionResponse->state ."<br>";
	if ($response->transactionResponse->state=="PENDING") {
		echo "pendingReason:".$response->transactionResponse->pendingReason ."<br>";
	}
	if(isset($response->transactionResponse->paymentNetworkResponseErrorMessage)) {
		echo "paymentNetworkResponseErrorMessage:".$response->transactionResponse->paymentNetworkResponseErrorMessage ."<br>";
	}
	if(isset($response->transactionResponse->trazabilityCode)) {
		echo "trazabilityCode:".$response->transactionResponse->trazabilityCode ."<br>";
		
	}
	echo "responseCode:".$response->transactionResponse->responseCode ."<br>";
	if(isset($response->transactionResponse->responseMessage)) {
		echo "responseMessage:".$response->transactionResponse->responseMessage ."<br>";
	}
	var_dump($response);
}
