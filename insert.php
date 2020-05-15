<?php
include_once "base.php";


/**
 * 新增資料
 * 
 * insert into `table` (`field1`,`field2`,`field3`) values('value1','value2','value3')
 * 
 * 
 */

$data=[
    "code"=>"dd",
    "number"=>"1122334455",
    "period"=>1,
    "expend"=>30,
    "year"=>"2020"
];

echo "<pre>";



$table='invoice';

echo insert($table,$data);


//   -----   type1   ------


function insert($table,$arg){

    global $pdo;
    $sql="insert into ";

    foreach($arg as $key => $value){

        // tmpKey[]=["code","number","period","expend","year"]
        // tmpValue[]=["aa","1122334455","1","30","2020"]
        // 如果欄位位置不相對應的話，會撈出錯誤資料
        $tmpKey[]=$key;
        $tmpValue[]=$value;
    }
// (`field1`,`field2`,`field3`) 
    $str1="(`".implode('`,`',$tmpKey)."`)";

// ('value1','value2','value3') 此處如果用 ('','',$tmpKey)."')" 會跳脫字元故改成下方的方法
    $str2="('".implode("','",$tmpValue)."')";
    
    echo $sql . $table . $str1 . "values" . $str2;
    
    $sql = $sql . $table . $str1 . "values" . $str2;
    
    return $pdo->exec($sql);
    
    
}




// -----  type2  ------


// function insert($table,$arg){

//     global $pdo;
//     $sql="insert into ";

//     // 未淨化版
//     // $str1="(`".implode('`,`',array_keys($arg))."`)";
//     // echo $str1 . "<br>";\
//     // // 其實不用再使用array_values取值一次因為是一樣的
//     // $str2="('".implode("','",array_values($arg))."')";

    
//     // 淨化版
//     // $str2="('".implode("','",$arg)."')";
//     // echo $str2 . "<br>";
    
//     //未淨化版
//     // $sql=$sql . $table . $str1 . "values" . $str2;


//     $sql="insert into $table (`".implode('`,`',array_keys($arg))."`) values ('".implode("','",$arg)."')";
//     echo $sql;
    
//     // return $pdo->exec($sql);
    
// }


?>