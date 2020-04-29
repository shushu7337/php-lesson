<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除會員資料</title>
</head>
<body>
    
</body>
</html>

<?php

// 取得post 過來的資料
$id=$_GET['user'];
// 建立連線

$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");

// 建立更新的sql語法
$sql="delete from `student` where `id`='$id'";

// 執行更新
$res=$pdo->exec($sql);

if($res>0){
    header("location:list_user.php");
}else{
    echo "刪除失敗<Br>";
    echo $sql;
}
// 跳回會員列表


?>