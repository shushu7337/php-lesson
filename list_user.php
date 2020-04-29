<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員列表</title>
</head>
<body>
    <?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,"root","");
    date_default_timezone_set("Asia/Taipei");

    $sql="select * from `student`";
    $rows=$pdo->query($sql)->fetchAll();

    foreach($rows as $row){
        echo $row['id']."-".$row['name']."+".$row['tel']."<br>";
    }

    
    
    ?>
</body>
</html>