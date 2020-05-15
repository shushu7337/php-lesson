<?php

sum(20,50);
echo "<hr>";
sum2(20,50,100);
echo "<hr>";
sum3([10,20,30,40,50]);
echo "<hr>";
sum3([10,20,30,40,50]);
echo "<hr>";
sum4(10,20,30,40,50);
echo "<hr>";

function sum($a,$b){
    echo $a + $b ;
}

function sum2($a,$b,$c){
    echo $a + $b + $c;
}

function sum3($a){
    $sum=0;
    foreach($a as $c){
        $sum=$sum+$c;
    }
    echo $sum;
}

// 第一個引數$b為必要，...$a為不一定必要
function sum4($b,...$a){
    print_r($a);
    $sum=$b;
    foreach($a as $c){
        $sum=$sum+$c;
    }
    echo $sum;
}

?>