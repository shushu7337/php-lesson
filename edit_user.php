<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <style>
    body{
        margin: 0;
        padding: 0;
    }
    form{
        display: inline-block;
        box-shadow: 1px 1px 3px #000;
        border-radius: 10px 10px;
    }
    b{
        left: 50%;
        top: 50%;
        width: 600px;
        height: 300px;
    }
    label{
        width: 80px;
    }
    </style>
</head>
<body>
<?php 
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,"root","");
    date_default_timezone_set("Asia/Taipei");

    $id=$_GET['user'];
    $sql="select * from `student` where `id`='$id'";
    $user=$pdo->query($sql)->fetch();


    
?>

<div class="container">
        <h1>編輯會員</h1>
        <form action="update_user.php" method="post" class="name">
         <div class="b row justify-content-center ">
        
            <div class="col-1">
                <input type="hidden" name="id" value="<?= $user['id'];?>" required>
            </div>
            <div class="col-5">
                <label for="name">username:</label>
                <input type="text" name="name" value="<?= $user['name'];?>" required>
            </div>
            <div class="col-6">
                <label for="password">password: </label>
                <input type="password" name="password" value="<?= $user['pw'];?>" required>
            </div>
            <div></div>
            <div class="col-5">
                <label for="account">account: </label>
                <input type="text" name="account" value="<?= $user['acc'];?>" required>
            </div>
            <div class="col-6">
                <label for="email">email: </label>
                <input type="email" name="email"  value="<?= $user['email'];?>" required>
            </div>
            <div></div>
            <div class="col-5">
                <label for="birth">birth: </label>
                <input type="date" name="birth" value="<?= $user['birthday'];?>" required>
            </div>
            <div class="col-6">
                <label for="tel">phone number: </label>
                <input type="number" name="tel" value="<?= $user['tel'];?>" required>
            </div>
        </div>
            <div class="row justify-content-md-center">
                <div class="col-3"><input type="submit" value="submit"></div>
                <div class="col-3"><input type="reset" value="reset"></div>
                
            </div>
            
        </form>
    </div>
</body>
</html>