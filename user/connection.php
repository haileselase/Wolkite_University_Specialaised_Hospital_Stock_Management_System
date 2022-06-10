<?php
$h_name ="localhost";
$uname="root";
$pass ="";
$db ="wku_spc_hos_stock_mgt_sys";

$link= mysqli_connect($h_name,$uname,$pass) or die(mysqli_error($link));
mysqli_select_db($link,$db) or die(mysqli_error($link));

?>
