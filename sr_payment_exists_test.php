<?php
//
require_once("./../common_functions_debug.php");
require_once("./../config/dbconfig_debug.php");
require_once("./../config/sync_config_rus.php");

$lead = new BPMLead($data_service_uri,$username,$password); 
$lead->UnisenderLogin="alloygroup";
$sum = 5900;
$payment_time_str = "2012-11-01 13:05:03";
$payment_time = strtotime($payment_time_str) - 7200;
if($lead->CheckPaymentExists($sum, $payment_time,true))echo "<h3>".$lead->UnisenderLogin."'s paiment $payment_time_str of $ $sum true!</h3>";
else echo "<h3>".$lead->UnisenderLogin."'s paiment $payment_time_str of $ $sum false!</h3>";
echo '<hr>';
$lead2 = new BPMLead($data_service_uri,$username,$password); 
$lead2->UnisenderLogin="apractic";
$sum = 5000;
$payment_time_str = "2012-11-01 13:06:11";
$payment_time = strtotime($payment_time_str) - 7200;
if($lead2->CheckPaymentExists($sum, $payment_time,true))echo "<h3>".$lead2->UnisenderLogin."'s paiment $payment_time_str of $ $sum true!</h3>";
else echo "<h3>".$lead2->UnisenderLogin."'s paiment $payment_time_str of $ $sum false!</h3>";

echo '<hr>';
$lead3 = new BPMLead($data_service_uri,$username,$password);
$lead3->UnisenderLogin="ArkomUkraine";
$sum = 95;
$payment_time_str = "2012-11-01 08:04:44";
$payment_time = strtotime($payment_time_str) - 7200;
if($lead3->CheckPaymentExists($sum, $payment_time,true))echo "<h3>".$lead3->UnisenderLogin."'s paiment $payment_time_str of $ $sum true!</h3>";
else echo "<h3>".$lead3->UnisenderLogin."'s paiment $payment_time_str of $ $sum false!</h3>";



?>