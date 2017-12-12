<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>我的博客空间</title>
    <meta name="description" content="Fresh Creative - Free CSS Template, Free XHTML CSS Design Layout"/>
    <link href="css/personal.css" rel="stylesheet" type="text/css"/>
    <link href="css/fullsize.css" media="screen" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.fullsize.minified.js"></script>
    <script language="javascript" type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

        $(function () {
            $("div.templatemo_gallery img").fullsize();
        });
    </script>
</head>
<body>
<div id="templatemo_container">
    <div id="templatemo_header">
        <div id="templatemo_logo_area">
            <div id="templatemo_logo">
                Welcome!
            </div>

        </div>

        <div id="templatemo_social">

            <a href="#"><img src="images/templatemo_icon_3.jpg" alt="RSS"/></a>
            <a href="#"><img src="images/templatemo_icon_2.jpg" alt="Twitter"/></a>
            <a href="#"><img src="images/templatemo_icon_1.jpg" alt="Delicious"/></a>

            <form action="personal.php" method="get">
                <input type="text" value="SEARCH" name="sub" class="field" onfocus="clearText(this)"
                       onblur="clearText(this)"/>
                <input type="submit" name="search" value="" alt="Search" class="button" title="Subscribe"/>
            </form>

        </div>

        <div id="templatemo_menu">
            <ul style="position: relative">
                <li><a href="#" class="current">主页</a></li>
                <li><a href="index.php" class="current">news</a></li>
                <li><a href="#" class="current">daily</a></li>

                <?php
                if ($_COOKIE['uid']) {

                    echo "<li><a style='color: #ff1a22;font-weight: bolder'>" . $_COOKIE['uname'] . "已登录</a></li>";
                    echo "<li><a href='ulogin.php' style='font-weight: bolder'>注销</a></li>";

                } else {

                    echo "<li><a href='login.php?page=2' style='font-weight: bolder'>未登录</a></li>";


                }
                ?>


            </ul>
        </div> <!-- end of menu -->

    </div>

    <div id="templatemo_content_area">

        <!--左侧第一部分-->
        <div id="templatemo_left">
            <div class="templatemo_section_1">
                <div class="middle">
                    <div class="bottom">
                        <p><?php
                            if (isset($_COOKIE['mood']))
                                echo "" . $_COOKIE['mood'] . "";
                            ?></p>
                    </div>
                </div>
            </div>

            <div class="templaemo_h_line"></div>

            <div class="btn-group">
                <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    文章分类
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" style="text-decoration: none">Action</a></li>
                </ul>
            </div>


            <?php

            //如果登录，可以添加文章
            if ($_COOKIE['uid']) {

                echo "
                        <button type=\"button\" class=\"btn btn-success\">添加文章</button>
                    ";

            }


            ?>









            <!--左侧第二部分-->
            <div class="templatemo_section_2">
                <div class="blue">
                    <h3>22 November 2024</h3>
                    <p>Proin vel libero id erat venen atis accu msan. Nunc blan dit orci sit amet risus.</p>
                </div>

                <div class="yellow">
                    <h3>30 October 2024</h3>
                    <p>Duis pul vinar scele risque ante. Mor bit risti que, risus quis congue pul vinar.</p>
                </div>
            </div>


            <div class="templaemo_h_line"></div>

        </div><!-- End of left -->

        <div id="templatemo_right">
            <div class="templatemo_section_3">
                <h1>Welcome</h1>
                <span class="blue_title">To Creative <b>IDEA</b></span>
            </div>

            <div class="templaemo_h_line"></div>


            <?php
            //多次使用
            include "connect.php";
            if (isset($_GET['search'])) {
                //如果有待搜索的文字
                $like = $_GET['search'];
                //用于模糊查询
                $w = "title like '%$like%'";
            } else {
                //显示全部
                $w = 1;
                //    select * from blog where 1 也是显示全部
            }
            //排序：asc正序  desc倒序
            $sql = "select * from blog where $w order by bid desc";

            //直接查询返回结果是resource，需要转换成array类型才能正常显示
            $query = mysqli_query($link, $sql); //查询结果返回resource类型

            //开始读取，逐行读取，指针下移
            while ($arr = mysqli_fetch_array($query)) {
                ?>

                <h4>
                    <!--del.php?bid=xx  这是一个get请求-->
                    <a href="all.php?bid=<?php echo $arr['bid'] ?>" style="text-decoration: none">
                        《
                        <?php echo $arr['title'] ?>
                        》
                    </a>
                    <?php

                    if (isset($_COOKIE['uid'])) {


                        echo "
                            
                            |
                            <a href=\"del.php?bid= " . $arr['bid'] . "\" style=\"text-decoration: none\">
                                删除
                            </a>
                            |
                            <a href=\"edit.php?bid= " . $arr['bid'] . "\" style=\"text-decoration: none\">
                                修改
                            </a>
                            
                            ";

                    }

                    ?>


                </h4>
                <div class="green">
                    <!--内容-->
                    <p>
                        <!--iconv_substr（）是一个可以可以切割中文的函数（要切的对象，从哪开始，切几个）-->
                        <?php echo iconv_substr($arr['content'], 0, 4) ?>...

                    </p>
                    <span style="list-style: none">

                    <?php echo $arr['time'] ?>

                </span>
                </div>


                <?php
            }
            ?>


            <div class="cleaner"></div>


        </div><!-- End of right -->

    </div> <!-- End of content_area -->

</div><!-- End Of Container -->
<div class="cleaner"></div>
<div id="templatemo_footer">
    Copyright © 2018 houwei
</div>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>