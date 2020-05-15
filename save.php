<?php

include_once "base.php";

$data=[
    "code"=>"qq",
    "number"=>"554466212",
    "period"=>3,
    "expend"=>30,
    "year"=>"2020"
];

// save('invoice',$data);

$row=find("invoice",9);
$row['code']="FF";
$row['period']="1";
$row['number']="5555664455";

 save('invoice',$row);


function find($table,$id){
    global $pdo;
    $sql="select * from $table where id ='$id'";
    // // 原先
    // $row=$pdo->query($sql)->fetch();
    // 修改版
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);//故在fetch()的()內輸入PDO::FETCH_ASSOC
    if(empty($row)){
        return "無相關資料";
    }
    return $row;
}



function save($table,$arg){
    global $pdo;

    if(isset($arg['id'])){
        // ****** update ******
        foreach($arg as $key => $value){
            // 多加一個判斷式
            if($key!='id'){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
        }
    
        $sql="update $table  set " .implode(',',$tmp)." where `id` ='".$arg['id']."'";
    }else{
        //* ****** insert *******
        $sql="insert into $table (`".implode('`,`',array_keys($arg))."`) values ('".implode("','",$arg)."')";
        
    }
    echo $sql;
    // return $pdo->exec($sql);
}



?>