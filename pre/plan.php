<?php
/**
 * 分期付款
 */
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

// $parameters = array(
// 		// Enter the plan‘s description here.
// 		PayUParameters::PLAN_DESCRIPTION => "Comprame Plan 001",
// 		// Enter the identification code of the plan here.
// 		PayUParameters::PLAN_CODE => "comprame_plan_002",
// 		// Enter the interval of the plan here.
// 		//DAY||WEEK||MONTH||YEAR
// 		PayUParameters::PLAN_INTERVAL => "MONTH",
// 		// Enter the number of intervals here.
// 		PayUParameters::PLAN_INTERVAL_COUNT => "1",
// 		// Enter the currency of the plan here.
// 		PayUParameters::PLAN_CURRENCY => "COP",
// 		// Enter the value of the plan here.
// 		PayUParameters::PLAN_VALUE => "10000",
// 		// (OPTIONAL) Enter the tax value here.
// 		PayUParameters::PLAN_TAX => "1600",
// 		// (OPTIONAL) Enter the tax base return here.
// 		PayUParameters::PLAN_TAX_RETURN_BASE => "8400",
// 		// Enter the account ID of the plan here.
// 		PayUParameters::ACCOUNT_ID => "500538",
// 		// Enter the retry interval here
// 		PayUParameters::PLAN_ATTEMPTS_DELAY => "1",
// 		// Enter the amount of charges that make up the plan here
// 		PayUParameters::PLAN_MAX_PAYMENTS => "12",
// 		// Enter the total amount of retries here for each rejected subscription payment
// 		PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => "3",
// 		// Enter the maximum amount of pending payments here that a subscription may have before being canceled.
// 		PayUParameters::PLAN_MAX_PENDING_PAYMENTS => "1",
// 		// Enter the amount of trial days of the subscription here.
// 		PayUParameters::TRIAL_DAYS => "30",
// );

// $response = PayUSubscriptionPlans::create($parameters);
// if($response){
// 	var_dump($response);
// }

$parameters = array(
		// Enter the identification code of the plan here.
		PayUParameters::PLAN_CODE => "comprame_plan_002",
);

$response = PayUSubscriptionPlans::find($parameters);
if($response){
	var_dump($response);
}


