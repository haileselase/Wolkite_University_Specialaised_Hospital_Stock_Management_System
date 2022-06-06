<?php
$link= mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"wku_spc_hos_stock_mgt_sys") or die(mysqli_error($link));
?>
