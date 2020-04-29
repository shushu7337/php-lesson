<?php

$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");
$sql="insert into student(`id`,
                        `acc`,
                        `pw`,
                        `name`,
                        `email`,
                        `tel`,
                        `create_time`,
                        `update_time`,
                        `birthday`) 
                values(null,
                       'shu',
                       '7337',
                       '張書豪',
                       'dreamsky1208@gmail.com',
                       '0919921618',
                       '".date("Y-m-d H:i:s")."',
                       '".date("Y-m-d H:i:s")."',
                       '1992-12-08')";

echo $sql;
echo "<br>";
//$pdo->query($sql);
echo $pdo->query($sql);  //不回傳資料，但回傳成功或失敗(1 or 0) //{inset} {delete} {update} 不會回傳
echo "資料已新增";

?>