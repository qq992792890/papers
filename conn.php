<?php
header("Content-Type: text/html; charset=utf-8");
// $conn = mysql_connect('localhost','root','') or die("MYSQL_connect:".mysql_errno());
$conn = mysql_connect('localhost','paperuser','paperuser') or die("MYSQL_connect:".mysql_errno());
// mysql_query("use test");
mysql_query("use paperinfo");
?>