<?php

session_start();

if ($_SESSION['uid']) {


    unset($_SESSION['uid']);
    unset($_SESSION['uname']);
    unset($_SESSION['mood']);


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