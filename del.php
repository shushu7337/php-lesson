<?php
// include_once "base.php";
/**
 * 刪除資料

 * delete from table (!!!需要極度注意!!!會刪除整個資料表)
 * 
 * delete from table where id=xx;
 * delete from table where xx='aa' && yy='bb'
 * 
 * 
 */

/**  $arg 以常用來說可能放入`id`，其餘皆為前述的陣列項目
 * $arg : 情況1: 如果$arg是陣列  ---is_array =>組合成條件用字串
 *        情況2: 如果$arg是id   ---delete id 這個欄位
*/
// 此函式為老師以"網頁乙級"為需求來做的

// 此語法有註明id名稱
// del('invoice',['id'=>2]);
// 此語法直接輸入數值不用註明id
// del('invoice',2);
// 
del('invoice',['period'=>1,'code'=>'aa']);
// 
del('invoice',7);



function del($table,$arg){
    global $pdo;
    $sql="delete from $table ";
    
    // 如果$arg為陣列的話
    if(is_array($arg)){
        $tmp=[];
        foreach($arg as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql." where " . implode(" && ",$tmp);
        
    }else{
        $sql=$sql." where `id`='$arg'";
    }
    echo $sql;
    echo "<hr>";
    // exec只會回傳成功或失敗
    // return $pdo->exec($sql);
}

?>