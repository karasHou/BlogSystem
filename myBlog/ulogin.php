<?php

if ($_COOKIE['uid']) {

    //将uid和uname、mood置空
    setcookie('uid', "");
    setcookie('uname', "");
    setcookie('mood', "");

    if (isset($_GET['page'])) {

        $page = $_GET['page'];

        if ($page == 1) {
            header("location:index.php");
        } else if ($page == 2) {
            header("location:personal.php");
        } else if ($page == 3) {
            header("location:all.php");
        }


    } else {
        //默认跳转到index.php
        header("location:index.php");


    }

    //跳转

}


?>