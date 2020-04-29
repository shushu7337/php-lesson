<?php

$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");

$name=$_POST['name'];
$password=$_POST['password'];
$account=$_POST['account'];
$email=$_POST['email'];
$birth=$_POST['birth'];
$tel=$_POST['tel'];

// echo $name;
// echo "<br>";
// echo $password;
// echo "<br>";
// echo $account;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $birth;
// echo "<br>";
// echo $tel;


$sql="insert into `student`(`acc`,`pw`,`name`,`email`,`tel`,`create_time`,`update_time`,`birthday`) values('$account','$password','$name','$email','$tel','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','$birth')";//只有在PHP裡的''(單引號)內可以輸入變數其他語言都是字串

echo $sql;

$res=$pdo->exec($sql);
if($res>=1){
    echo $res;
    echo "新增成功";
}else{
    echo $res;
    echo "新增失敗";
}


?>