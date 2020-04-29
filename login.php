<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    h1{
        text-align: center;
    }
    form{
        
        height: 100%;
    }
    .box{
        height:100px;
        width: 300px;
        box-shadow: 1px 1px 3px #000;
        border-radius: 10px 10px;
    }
    label{
        width: 80px;
    }
    input{
        width: 100px;
        border-radius: 30px 30px;
    }
    </style>
<body>
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,"root","");
date_default_timezone_set("Asia/Taipei");
?>
<h1>Login</h1>
<div class="container col-12 row justify-content-center">
    
    <div class="box col-6 row justify-content-center">
        <form action="list_user.php" method="post">
            <div class="row">
                <div class=" col-6 row justify-content-center">
                    <label for="name">account:</label>
                    <input type="text" name="name" value="" require>
                </div>
                <div class="col-6 row justify-content-center">
                    <label for="password">password:</label>
                    <input type="text" name="password" value="" require>
                </div>
                <div class="col-12-align-self-end row justify-content-center ">
                    <div class=""><input type="submit" value="Login">
                </div>

            </div>
        </form>
    </div>
</div>
</body>
</html>