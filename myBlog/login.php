<?php

include "connect.php";

if (isset($_GET['page'])) {

    //将当前转来的页面写入cookie
    setcookie('page', $_GET['page']);
    $page = $_GET['page'];
}

if (isset($_POST['sub'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $pass = md5($pass);

    $page = $_POST['hid'];

    $sql = "select * from user where uname = '$uname' and pass = '$pass'";

    $query = mysqli_query($link, $sql);

    $result = mysqli_fetch_array($query);


    //查询到，可以登录
    if ($result) {
        //cookie中写入值（可以多个）
        setcookie('uid', $result['uid']);
        setcookie('uname', $result['uname']);
        setcookie('mood', $result['mood']);


        //从cookie取出当前页面的page值



        //如果包含1，说明是index界面调用的login
        if ($page == 1) {

            echo "<script>location = 'index.php'</script>";
//            header("location:index.php");
        } else if ($page == 2) {
            echo "<script>location = 'personal.php'</script>";

//            header("location:personal.php");
        } else if ($page == 3) {
            echo "<script>location = 'all.php'</script>";

//            header("location:all.php");
        } else {
            //如果都没匹配到跳转至主页
            echo "<script>location = 'index.php'</script>";

        }

        echo "<script>alert('登录成功')</script>";


    } else {
//        登录不成功，需要重新登录
        echo "<script>alert('该用户不存在,请重新登录!')</script>";
//        header('location:')
    }

//        cookie：文件存储在本地的文件中，不能跨域 还要存一个session id
//        session：文件存储在服务器上

}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>Login</title>
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
    <h1>Login</h1>
    <form action="login.php" method="post">
        <div>
            <input type="text" name="uname" class="username" placeholder="Username" autocomplete="off" autofocus/>
        </div>
        <div>
            <input type="password" name="pass" class="password" placeholder="Password" oncontextmenu="return false"
                   onpaste="return false"/>
        </div>
        <input type="hidden" name="hid" value="<?php echo $page; ?>">
        <input type="submit" name="sub" value="登录" id="submit" style="background: #ef4300;cursor: pointer">
        <button type="button" onclick="window.location.href='reg.php'" style="width: 270px;height: 42px;color: #212d25">
            注册
        </button>

    </form>
    <div class="connect">
        <p style="margin-top:20px;">如果只是遇见，不能停留，不如不遇见。</p>
    </div>
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
<script src="js/supersized-init.js"></script>
<script>
    $(".btn").click(function () {
        is_hide();
    })
    var u = $("input[name=uname]");
    var p = $("input[name=pass]");
    $("#submit").live('click', function () {
        if (u.val() == '' || p.val() == '') {
            $("#ts").html("用户名或密码不能为空~");
            is_show();
            return false;
        }
        else {
            var reg = /^[0-9A-Za-z]+$/;
            if (!reg.exec(u.val())) {
                $("#ts").html("用户名错误");
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

