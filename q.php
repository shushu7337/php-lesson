<?php

include_once "base.php";

//利用此函式直接輸入sql語法就可以撈出資料 
//example
$row=q("select * from invoice where id='11'");

print_r($row) ;
echo "<br>";
echo $row[0]['number'];

$row=q("select * from invoice where period='2'");

print_r($row) ;
echo "<br>";
echo $row[2]['number'];

$row=q("insert into invoicevalues(null,'cg','9999999','1','99','2020'");


function q($sql){
    global $pdo;

    return $pdo->query($sql)->fetchALL();
}