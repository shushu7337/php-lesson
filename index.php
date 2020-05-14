<?php

stars(8);
for($i=0;$i<10;$i++){
    $rand=rand(5,20);
    stars($rand);
}

function stars($s){ 
    for($i=0 ; $i<$s ; $i++){
       for($j=$i ; $j<$s-1 ; $j++){
         echo "&nbsp&nbsp";
         echo "*";
        }
        echo "<br>";
    }
    
}


?>
