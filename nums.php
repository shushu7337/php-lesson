<?php
/**
 * 計算筆數
 * 
 * select count(*) from `table` where xx='yy' && zz='aa';
 * select count(*) from `table`;
 * select count(*) from  `table` group by;
 * 
 */

include "base.php";

$total=nums('invoice');
echo "<hr>";
echo $total;

echo "<hr>";

$total=nums('invoice',["period"=>1]);
echo "<hr>";
echo $total;

function nums($table,...$arg){
    global $pdo;
    $sql="select count(*) from $table ";
    
    if(isset($arg[0]) && is_array($arg[0])){
        $tmp=[];
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql." where " . implode(" && ",$tmp);
        
    }
    if(isset($arg[1])){
        $sql=$sql . $arg[1];
    }
    echo $sql;
    echo "<hr>";
    return $pdo->query($sql)->fetchColumn();
}

?>