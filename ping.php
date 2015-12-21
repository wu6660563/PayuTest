<?php

/**
 * 查询Payu PING
 */
require_once 'payulib/PayU.php';

PayU::$apiKey = "6u39nqhq8ftd0hlvnjfs66eh8c";
PayU::$merchantId = "500238";
PayU::$apiLogin = "11959c415b33d0c";
PayU::$language = SupportedLanguages::ES;
PayU::$isTest = true;

$startTime = date('Y-m-d H:i:s');

Environment::setPaymentsCustomUrl("https://stg.api.payulatam.com/payments-api/4.0/service.cgi");
// Queries URL
Environment::setReportsCustomUrl("https://stg.api.payulatam.com/reports-api/4.0/service.cgi");
// Subscriptions for recurring payments URL
Environment::setSubscriptionsCustomUrl("https://stg.api.payulatam.com/payments-api/rest/v4.3/");


$response = PayUReports::doPing();
echo $response -> code;

$endTime = date("Y-m-d H:i:s");
$content = 'startTime:'.$startTime.'-----endTime:'.$endTime.PHP_EOL;
$content .= json_encode($response).PHP_EOL;

$handle = fopen('logs/ping.log', "a+");
$str = fwrite($handle, $content);
fclose($handle);

