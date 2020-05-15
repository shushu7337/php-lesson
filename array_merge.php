<?php


$a=["只有","3mm"];

$b=["沒有","30cm"];

$c=["館長","絕對"];

$merge=array_merge($c,$a,$b);

echo "<pre>". print_r($merge)."<pre>"; 

echo "test";

$test=am($c,$b,$a);

echo "<hr>";

am($c,$b,$d);

print_r($test);

function am($c,...$b){
    
    // 檢查是否為陣列
    if(is_array($c)){
        $array=$c;
    }else{
        echo "not an arrya";
    }
    foreach($b as $item){
        if(is_array($item)){
            foreach($item as $i){
                $array[]=$i;
            }
        }
    }
    echo $array;    

    return $array;
}


?>