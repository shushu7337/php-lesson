<h1>資料庫連線</h1>
<?php
// 下面這行要背起來
$dsn="mysql:host=localhost;charset=utf8;dbname=students";
$pdo=new PDO($dsn,'root','');

$sql="select * from students";
$rows=$pdo->query($sql)->fetchAll();

// rows===一條資料
//查詢語句 $pdo->query($sql) 送進 $sql="select * from students";
// ->fetchAll() 取出資料

echo $rows[1]['name'];
echo "<hr>";
echo $rows[1][3];
echo "<hr>";
echo $rows[1]['addr'];
echo"<hr>";
echo $rows[1][5];
echo "<hr>";
echo $rows[2]['grad_at'];
echo "<hr>";
echo $rows[2][10];
echo "<hr>";
echo "<pre>";
print_r($rows);
echo "</pre>";

?>