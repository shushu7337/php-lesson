<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
    }

    form {

        height: 100%;
    }

    .box {
        height: 130px;
        width: 450px;
        box-shadow: 1px 1px 3px #000;
        border-radius: 10px 10px;
    }

    label {
        width: 80px;
    }

    input {
        width: 100px;
        border-radius: 5px 5px;
        margin: 10px 0 0 10px;
        border: 1px solid #999999;
    }

    .login {
        text-align: center;
    }

    .alert {
        font-size: 10px;
        color: #FF0000;
        font-weight: bold;
        opacity: 0.4;
    }
</style>

<body>
    <h1>Login</h1>
    <div class="container box col-12 ">
        <div class="row justify-content-center ">
            <form action="chklogin.php" method="post">
                <div class="row">
                    
                    
                </div>

                <div class="alert row justify-content-center align-items-end">
                    <?php
                    // ver 1
                    //  if(isset($_GET['status'])){
                    //         if($_GET['status']=='false'){
                    //              echo "--帳號或密碼錯誤--";
                    //         }
                    //     }
                    // ver 2
                    $showLogin = true;
                    if (isset($_COOKIE['status'])) {
                        // echo "status".$_COOKIE['status'];
                        switch ($_COOKIE['status']) {
                            case 'false':
                                echo "--帳號或密碼錯誤--";
                                break;
                            case 'true':
                                //   echo "get=".$_COOKIE['id'];
                                $showLogin = false;
                                //   header("location:list_user.php?id=".$_COOKIE['id']);
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    if ($showLogin == true) {
                    ?>
                        <div class=" col-6  ">
                            <label for="acc">account:</label>
                            <input type="text" name="acc" id="acc" require>
                        </div>
                        <div class="col-6  ">
                            <label for="pw">password:</label>
                            <input type="text" name="pw" id="pw" require>
                        </div>
                        <div class="login"><input type="submit" value="Login">
                            </div>
                        <div class="login"><input type="reset" value="Reset">
                            </div>
                    <?php
                    } else {
                        echo "已登入";
                        echo "<a href='logout.php'>登出</a>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>