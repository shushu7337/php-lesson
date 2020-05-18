
<?php
//在使用save()回傳的時候記得把find 給註解掉
// include "save.php";
include "base.php";

// 增加收尋條件，並且印出單筆

echo "<hr>";

$row=find('invoice',4);
if(is_array($row)){
    echo $row['id'].'<br>';
    echo $row['number'].'<br>';
    echo $row['expend'];
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}else{
    echo $row;
    echo "<hr>";
}

$row=find('invoice',['year'=>'2020','period'=>'1']);
if(is_array($row)){
    echo "<hr>";
    echo $row['id'].'<br>';
    echo $row['number'].'<br>';
    echo $row['year'].'<br>';
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

// 使用find 找完資料後 做修改
$row['year']="2021";
$row['period']="2";
echo "<pre>";
print_r($row);
echo "</pre>";



function to($url){
    header("location:".$url);
}

function find($table,$arg){
    global $pdo;
    $sql="select * from $table";
    
    if(is_array($arg)){
        $tmp=[];
        foreach($arg as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql . " where " . implode(" && ", $tmp);
    }else{
       $sql=$sql . "where `id`='$arg'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

?>
