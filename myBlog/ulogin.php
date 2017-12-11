<?php

if ($_COOKIE['uid']) {

    //将uid和uname置空
    setcookie('uid', "");
    setcookie('uname', "");

    //跳转
    header("location:index.php");

}


?>