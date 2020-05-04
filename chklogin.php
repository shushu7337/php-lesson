<?php
include "dbconnect.php";
// //include("dbconnect.php");

// $dsn="mysql:host=localhost;charset=utf8;dbname=school";
// $pdo=new PDO($dsn,"root","");
// date_default_timezone_set("Asia/Taipei");



if(!empty($_POST['acc'])){
    echo "有送出資料";
    $acc=$_POST['acc'];
    $pw=$_POST['pw'];

    //搭配ver2用
    $sql="select * from student where `acc`='$acc' && `pw`='$pw'";
    
    //搭配ver3用
    // $sql="select count(*) from `student` where `acc`='$acc' && `pw`='$pw'";

    //搭配ver2用
    //$user=$pdo->query($sql)->fetch();
    //這裡已經有跟資料庫做檢查作用

    //搭配ver3用
    // type 1
    // $user=$pdo->query($sql)->fetchColumn();

    // type 2
    $user=$pdo->query($sql)->fetch();
// 說明：
//      type1 fetchColumn()跟下方搭配的變數不能為陣列，因為type1的$user為數值
//      type2 fetch()所讀取的資料為陣列資料，在下方變數即可使用$user['id']陣列

    //ver1
    //所以這裡就不用再檢查一次，而且程式密碼有機密上的問題，不建議直接把資料撈出來會有被盜取的問題
    //且如果$user=$pdo->query($sql)->fetch()此處帳號密碼打錯的話，會讀到空值並回傳到'acc'或'pw'陣列而跳出錯誤碼
    //  if($acc==$user['acc'] && $pw==$user['pw']){
    //      echo "登入成功";
    //  }else{
    //      echo "登入失敗";
    //  }


    //ver2
    // type 1
    // if(!empty($user)){
    //     echo "登入成功";
    //     setcookie("id",$user,time()+60*3);
    //     setcookie("status",'true',time()+60*3);
    //     header("location:list_user.php");
    // }else{
    //     echo "登入失敗";
    //     setcookie("status",'false',time()+10);
    //     header("location:login.php");
    // }
    
    // type 2

    if(!empty($user)){
        echo "登入成功";
        setcookie("id",$user['id'],time()+60*3);
        setcookie("status",'true',time()+60*3);
        header("location:list_user.php");
    }else{
        echo "登入失敗";
        setcookie("status",'false',time()+10);
        header("location:login.php");
    }

    //ver3
    // if($user>0){
    //     echo "登入成功";
    //     header("location:list_user.php?status=$user");
    // }else{
    //     echo "登入失敗";
    //     header("location:login.php?status=false");
    // }

}

?>