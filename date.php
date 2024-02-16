<?php 
date_default_timezone_set('Asia/Kolkata');// change according timezone
$date=date_create("2019-01-20");
date_add($date,date_interval_create_from_date_string("10 days"));
echo date_format($date,"Y-m-d");
?>