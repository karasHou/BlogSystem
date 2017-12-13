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
         style="height: 1000px;width: 1000px; margin: 0 auto;background: #f7fff7;z-index: 1000;position: relative;">

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
                            <li><a href="personal.php">我的博客空间</a></li>
                            <li class="active"><a>文章详情</a></li>
                            <li class="dropdown">
                            </li>
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

            <div class="row" style="margin-top: 50px;">
                <div class="col-md-3" style="background: #ff00ff;height: 1000px;">侧边</div>
                <div class="col-md-9" style="background: #00ff00;height: 1000px;">

                    <h3>

                    </h3>


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