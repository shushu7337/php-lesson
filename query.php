<?php
$dsn="mysql:host=localhost;chartset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");

$sql="select * from `student` ";

$rows=$pdo->query($sql)->fetchAll();

foreach($rows as $r){
        echo    $r['id'].$r['name']. " - " .$r['tel'] . " - ".$r['email']."<br>";
}





?>