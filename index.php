<h1>資料庫連線</h1>
<?php
// 下面這行要背起來
// dbname 為資料庫的名稱
// students 為資料表

$dsn="mysql:host=localhost;charset=utf8;dbname=students";
$pdo=new PDO($dsn,'root','');

$sql="select * from students";
/*
    PDO::FETCH_ASSOC-->索取陣列名稱(較常用)
    PDO::FETCH_NUM-->索取欄位順序(聚合函式的時候比較常用，在不需要記欄位名稱的狀態適用)
    PDO::FETCH_BOTH-->預設值

*/

// fetchALL 索取所有
// $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//fetch 索取單一資料為主要用途





$rows=$pdo->query($sql);
// $pdo->query($sql) 這個為物件(object)，送這個物件出去後
// 由FETCH、FETCHALL、FETCHCOLUMN來索取資料
// 一次的pdo會溝通兩次

$row=$rows->fetch(PDO::FETCH_ASSOC); /*執行第一次*/
$row=$rows->fetch(PDO::FETCH_ASSOC); /*執行第二次*/
$row=$rows->fetch(PDO::FETCH_ASSOC); /*執行第三次*/
$row=$rows->fetch(PDO::FETCH_ASSOC); /*執行第四次*/


// $rows=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
// $rows=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

// 無法像上方敘述取得資料是因為，FETCH一次後他的rows已經有東西了，執行第二行的時後又去query同個位置，所以只能取得同一位置的資料，執行2,3,4次都與第一次同結果


// rows===一條資料
//查詢語句 $pdo->query($sql) 送進 $sql="select * from students";
// ->fetchAll() 取出資料

// echo $row['name'];
// echo "<hr>";
// echo $rows[1]['name'];
// echo "<hr>";
// echo $rows[1][3];
// echo "<hr>";
// echo $rows[1]['addr'];
// echo"<hr>";
// echo $rows[1][5];
// echo "<hr>";
// echo $rows[2]['grad_at'];
// echo "<hr>";
// echo $rows[2][10];
// echo "<hr>";
// echo "<pre>";
// print_r($rows);
// echo "</pre>";

?>
<table>
<style>
table {
    border-collapse: collapse;
    border: 1px solid #888;
    box-shadow: 0 0 5px #ccc;
}
table td{
    padding: 5px;
    border: 1px solid #666;
}
table tr:nth-child(odd){
    background: lightgray;
}
table tr:hover{
    background: lightgreen;
}




</style>
<?php
// 變數命名習慣，多數的話會加個s 單數則不用加s 
foreach($rows as $row){
    echo "<tr>";
    echo "    <td>".$row['uni_id']."</td>";
    echo "    <td>".$row['dept']."</td>";
    echo "    <td>".$row['name']."</td>";
    echo "    <td>".$row['parent']."</td>";
    echo "    <td>".$row['nat_id']."</td>";
    echo "</tr>";
}
?>
</table>







?>