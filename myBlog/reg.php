<?php

include "connect.php";

if (isset($_POST['sub'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    //使用md5加密密码
    $pass = md5($pass);

    $mood = $_POST['mood'];

    //检测重名
    $sql = "select * from user where uname = '$uname'";
    $query = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);

    //查到重名
    if ($result) {
        echo "<script>alert('该用户名已经被使用！')</script>";
    } else {
        //未重名
        //不重名，写入到数据库中，跳转登录界面
        $sql = "insert into user(uid,uname,pass,mood) values(null,'$uname','$pass','$mood')";
        $query = mysqli_query($link, $sql);
        echo "<script>location = 'login.php'</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/supersized.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body oncontextmenu="return false">

<div class="page-container">
    <h1>Register</h1>
    <form action="reg.php" method="post">
        <!--    <form action="" method="post">-->
        <div>
            <input type="text" name="uname" class="username" placeholder="Username" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="pass" class="password" placeholder="Password" oncontextmenu="return false"
                   onpaste="return false"/>
        </div>
        <div>
            <input type="password" name="pass2" class="password" placeholder="Check Password"
                   oncontextmenu="return false"
                   onpaste="return false"/>
        </div>
        <div>
            <input type="text" name="mood" placeholder="个性签名"
                   oncontextmenu="return false"
                   onpaste="return false"/>
        </div>

        <input type="submit" name="sub" value="注册" id="submit" style="background: #ef4300;cursor: pointer">

    </form>
</div>
<div class="alert" style="display:none">
    <h2>消息</h2>
    <div class="alert_con">
        <p id="ts"></p>
        <p style="line-height:70px"><a class="btn">确定</a></p>
    </div>
</div>

<!-- Javascript -->
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init1.js"></script>
<script>
    $(".btn").click(function () {
        is_hide();
    });

    var u = $("input[name=uname]"); //获取用户名
    var p = $("input[name=pass]");  //获取密码
    var p2 = $("input[name=pass2]");    //获取二次密码

    $("#submit").live('click', function () {

        if (u.val() == '' || p.val() == '') {
            $("#ts").html("用户名或密码不能为空~");
            is_show();
            return false;
        } else {
            //判断用户名是否非法输入
            var reg = /^[0-9A-Za-z]+$/;
            if (!reg.exec(u.val())) {
                $("#ts").html("用户名错误");
                is_show();
                return false;
            }

            if (p.val() != p2.val()) {
                $("#ts").html("两次密码输入不一致，请重新输入");
                is_show();
                return false;
            }
        }
    });


    window.onload = function () {
        $(".connect p").eq(0).animate({"left": "0%"}, 600);
        $(".connect p").eq(1).animate({"left": "0%"}, 400);
    };

    function is_hide() {
        $(".alert").animate({"top": "-40%"}, 300)
    }

    function is_show() {
        $(".alert").show().animate({"top": "45%"}, 300)
    }
</script>
</body>

</html>

