<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新會員資料</title>
</head>
<body>
    
</body>
</html>

<?php

// 取得post 過來的資料

$id=$_POST['id'];
$name=$_POST['name'];
$acc=$_POST['acc'];
$password=$_POST['pw'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$birth=$_POST['birthday'];

// 建立連線

$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");

// 建立更新的sql語法
$sql="update `student` set `acc`='$acc',`pw`='$password',`name`='$name',`email`='$email',`tel`='$tel',`birthday`='$birth' where `id`='$id'";

// 執行更新
$res=$pdo->exec($sql);

if($res>0){
    header("location:list_user.php");
}else{
    echo "更新失敗<br>";
    echo $sql;
}
// 跳回會員列表




?>