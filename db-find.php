
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=invoice";
$pdo=new PDO($dsn,'root',"");
date_default_timezone_set("Asia/Taipei");
session_start();

// $rows=all('invoice');
// foreach($rows as $row){
//     echo $row['number'];
//     echo "<br>";
//     echo $row['expend'];
// }
$row=find('invoice',30);
if(is_array($row)){
    echo $row['number'].'<br>';
    echo $row['expend'];
}else{
    echo $row;
}



// 導頁面函式
function to($url){
    header("location:".$url);
}



// 尋找id 函式
// 2020-05-15可思考加入其他收尋條件


function find($table,$id){
    global $pdo;
    $sql="select * from $table where id ='$id'";
    $row=$pdo->query($sql)->fetch();
    if(empty($row)){
        return "無相關資料";
    }
    return $row;
}



?>
