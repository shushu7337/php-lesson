<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=invoice";
$pdo=new PDO($dsn,'root',"");
date_default_timezone_set("Asia/Taipei");
session_start();
?>

<!-- 遠端版 -->
<!-- 
 $dsn="mysql:host=localhost;charset=utf8;dbname=s1090205";
 $pdo=new PDO($dsn,'s1090205',"s1090205");
 date_default_timezone_set("Asia/Taipei");
 session_start(); -->

