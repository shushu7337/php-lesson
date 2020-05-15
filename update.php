<?php
include_once "base.php";

/**
 * 更新資料
 * 
 * update table set xx='aa',yy='bb',zz='cc'
 * update table set xx='aa',yy='bb',zz='cc' where xx='aa' && yy='bb'
 * 
 * 以乙級來說收尋 id 的用法會佔多數
 * update table set xx='aa',yy='bb',zz='cc' where id='?'
 * 
 *
 * 
 */
$table='invoice';

$row=find('invoice',1);
echo "<pre>";
print_r($row);
echo "</pre>";
// 因為在function find()中使用fetch的話會把資料的欄位跟索引值都索引出來，所以，多出的索引欄位資料會導致錯誤

$row['code']="zz";


// update 一定有id的值所以不用設置第三個變數來增加收尋條件
update($table,$row);
// 如果修改的資料跟原先的資料一樣的話執行會成功但不會有任何引響

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


function update($table,$arg){
    global $pdo;
    $sql="update $table ";

    foreach($arg as $key => $value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
    }
    $sql=$sql . "set" .implode(',',$tmp)." where `id` ='".$arg['id']."'";


    echo $sql;
    // return ;
}

?>