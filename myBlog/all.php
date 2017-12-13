<?php
include "connect.php";

//注销后从cookie中读取bid值
if (isset($_COOKIE['bid'])) {

    $bid = $_COOKIE['bid'];

}


if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    setcookie('bid', $_GET['bid']);

}


    $sql = "update blog set hits=hits+1 where bid = '$bid'";
    $query = mysqli_query($link, $sql);
    if ($query) {
        //显示当前页
        $sql = "select * from blog where bid='$bid'";
        $query = mysqli_query($link, $sql);
        //得到转换后的数组
        $arr = mysqli_fetch_array($query);

        //查询对应文章的作者
        $uid = $arr['writer'];
        $sql_w = "select uname from user where  '$uid' = uid";


        $query_w = mysqli_query($link, $sql_w);
        if ($query_w) {
            $arr_w = mysqli_fetch_array($query_w);
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="demo-2" style="position: relative">
    <div class="content" style="position: fixed; top: 0;">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
        </div>
    </div>

    <!--主体内容展示-->
    <div id="content"
         style="width: 1000px; margin: 0 auto;z-index: 1000;position: relative;">

        <div class="container-fluid">

            <nav class="navbar navbar-default navbar-fixed-top hidden-xs">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <span class="glyphicon glyphicon-leaf"></span>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav">
                            <p class="navbar-text">欢迎~</p>
                            <li><a href="index.php">主页</a></li>
                            <li><a href="
                                <?php
                                $uid = "";
                                if (isset($_COOKIE['uid'])) {
                                    $uid = $_COOKIE['uid'];
                                }
                                    echo "personal.php?writer=$uid";

                                ?>
                            ">我的博客空间</a></li>
                            <li class="active"><a>文章详情</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <?php
                            //如果cookie中有值
                            if ($_COOKIE['uid']) {
                                echo
                                    "<p class='navbar-text'>" . $_COOKIE['uname'] . "&nbsp;
                            <span class=\"alert alert-success\" role=\"alert\" style='padding: 8px'>
                            已登录
                            </span >
                            </p>";
                                echo "<li><a href='ulogin.php?page=3'><strong>注销</strong></a></li>";
                            } else {
                                //                    这里标明all界面的page值为3
                                echo "<li><a href='login.php?page=3'><span class=\"alert alert-info\" role=\"alert\" style='padding: 10px'>未登录</span></a></li>";
                            }
                            ?>


                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="row" style="margin-top: 70px;height: 100%">
                <div class="col-md-3" style="margin-top: 20px;background-color: #e3e5b3;border-radius: 10px">

                    <h4>评论</h4>


                </div>
                <div class="col-md-9"
                     style="height: 100%;background-color:#e5f3ed; color: #445d3b; padding: 30px;border-radius: 10px;">

                    <h3 class="leader"><?php echo $arr['title'] ?></h3>
                    <div class="leader" style="font-weight: bolder">
                        <span>时间：<?php echo $arr['time'] ?></span>&nbsp;
                        <span>访问量：<?php echo $arr['hits'] ?></span>&nbsp;
                        <span>作者：<?php echo $arr_w['uname'] ?></span>&nbsp;
                    </div>

                    <hr style="border: 0.5px solid #484848;"/>

                    <p><?php echo $arr['content'] ?></p>
                    <hr/>


                </div>

            </div>

        </div>


    </div>
    <!--主体内容展示-->

</div><!-- /container -->


<script src="js/jquery-2.1.4.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/demo-2.js"></script>

</body>
</html>