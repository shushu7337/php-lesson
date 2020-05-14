
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="get">
    <input type="number" name="stars">
    <input type="submit" value="send">
    </form>
</body>
</html>

<?php
if(isset($_GET['stars'])){
    $stars=$_GET['stars'];
    stars($stars);
}


function stars($s){ 
    for($i=0 ; $i<$s ; $i++){
       for($j=$i ; $j<$s-1 ; $j++){
        echo "*";
         echo "&nbsp&nbsp";
        }
        echo "<br>";
    }
    
}


?>
