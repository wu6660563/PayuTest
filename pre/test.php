<?php
// require_once 'payulatam.php';
// $payu = new Payu();
// $rows = $payu->getPayuSetting();
// // var_dump($rows);
// foreach ($rows as $row) {
// 	foreach ($row as $key => $value) {
// 		echo "key:".$key."====value:".$value."<br>";
// 	}
// }


define('RUN_ENV', '');
$referenceCode = "100033675";
$referenceCode = RUN_ENV."_".$referenceCode."<br>";
echo $referenceCode;

echo explode("_", $referenceCode)[1];
