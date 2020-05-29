<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");

$sql="update `student` set `name`='王大明' , `birthday`='1992-02-22',`tel`='0913231232' where `id`='2'";
$res=$pdo->exec($sql);

echo "<br>";
echo $sql;

if($res>=1){
        echo $res;
        echo "更新成功!";
        echo "<br>";
}else{
        echo $res;
        echo "更新失敗";
}

?>