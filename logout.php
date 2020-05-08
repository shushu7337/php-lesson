<?php

    // setcookie("id","",time()-60*3);
    // setcookie("status",'true',time()-60*3);
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['status']);
    header("location:login.php");
?>