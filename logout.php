<?php

    setcookie("id","",time()-60*3);
    setcookie("status",'true',time()-60*3);
    header("location:login.php");
?>