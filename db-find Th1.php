
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=invoice";
$pdo=new PDO($dsn,'root',"");
date_default_timezone_set("Asia/Taipei");
session_start();



// 增加收尋條件，並且印出單筆

echo "<hr>";

$row=find('invoice',["year"=>"2020","period"=>"1"]);
if(is_array($row)){
    echo "<hr>";
    echo $row['id'].'<br>';
    echo $row['number'].'<br>';
    echo $row['year'].'<br>';
}

function to($url){
    header("location:".$url);
}


function find($table,...$id){
    global $pdo;
    $sql="select * from $table";
    $row=$pdo->query($sql)->fetch();
    
    if(isset($id[0]) && is_array($id[0])){
        $tmp=[];
        foreach($id[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql . " where " . implode(" && ", $tmp);
        echo $sql;
        
    }else{
        return "無相關資料";
    }
    return $row;
}

?>
