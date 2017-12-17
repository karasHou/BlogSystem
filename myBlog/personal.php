<?php

//未登录，跳转至登录界面
if (!$_COOKIE['uid']) {

    echo "<script>alert('清先登陆!')</script>";
    echo "<script>location='login.php';</script>";

}

?>

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
                <?php
                include "connect.php";

                $writer = $_GET['writer'];

                $sql_w = "select uname from user where uid = '$writer'";

                $query_w = mysqli_query($link, $sql_w);

                if ($query_w) {

                    $arr_w = mysqli_fetch_array($query_w);

                    $uname = $arr_w['uname'];

                    echo "$uname";

                }
                ?>

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
                <li><a href="index.php" class="current">主页</a></li>
                <li><a href="index.php" class="current">news</a></li>
                <li><a href="#" class="current">daily</a></li>

                <?php
                if ($_COOKIE['uid']) {

                    echo "<li><a style='color: #ff1a22;font-weight: bolder'>" . $_COOKIE['uname'] . "已登录</a></li>";
                    echo "<li><a href='ulogin.php?page=1' style='font-weight: bolder'>注销</a></li>";

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
                    </div>
                </div>
            </div>

            <div class="templaemo_h_line"></div>

            <!--            <div class="btn-group">-->
            <!--                <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown"-->
            <!--                        aria-haspopup="true" aria-expanded="false">-->
            <!--                    文章分类-->
            <!--                    <span class="caret"></span>-->
            <!--                </button>-->
            <!--                <ul class="dropdown-menu">-->
            <!--                    <li><a href="#" style="text-decoration: none">Action</a></li>-->
            <!--                </ul>-->
            <!--            </div>-->


            <?php

            //如果是博主，可以添加文章
            if ($_COOKIE['uid'] && $_COOKIE['uid'] == $writer) {
                //保存用户uid
                $uid = $_COOKIE['uid'];

                echo "
                       <button type=\"button\" class=\"btn btn-success\" onclick=\"window.location.href='add.php?uid=$uid'\">添加文章</button>
                    ";
            }
            ?>


            <!--左侧第二部分-->
            <div class="templatemo_section_2">
                <h4 class="text-center" style="margin: 5px;color: #ee444e ">热门评论</h4>

                <?php


                $uid = $_GET['writer'];

                $sql_c = "select * from comment where holder_id = '$uid' order by post_date desc";

                $query_c = mysqli_query($link, $sql_c);

                while ($arr_c = mysqli_fetch_array($query_c)) {

                    $article = $arr_c['article_id'];

                    $sql_article = "select b.title from  blog b,comment c where $article = b.bid ";

                    $query_article = mysqli_query($link, $sql_article);

                    if ($query_article)
                        $arr_article = mysqli_fetch_array($query_article);


                    ?>

                    <div class="blue">
                        <h5>《<?php echo $arr_article['title']; ?>》</h5>
                        <p><?php echo $arr_c['content']; ?></p>
                        <span><?php echo $arr_c['post_date']; ?></span>
                    </div>


                    <?php
                }
                ?>


            </div>


            <div class="templaemo_h_line"></div>

        </div><!-- End of left -->

        <div id="templatemo_right">
            <div class="templatemo_section_3">
                <h1>Welcome</h1>
                <span class="blue_title">To Creative <b>IDEA</b></span>
            </div>

            <!--            分割线-->
            <div class="templaemo_h_line"></div>

            <!--文章的主题显示部分--------------------------------------------------------->

            <?php

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

            //$writer的默认值是当前用户的uid
            $writer = $_COOKIE['uid'];

            //主页跳转过来的(游客或会员或博主)
            if ($_GET['writer']) {

                $writer = $_GET['writer'];

            }


            //排序：asc正序  desc倒序
            $sql = "select * from blog where  writer = $writer  and $w order by bid desc";

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

                    //当前用户的id和调转页面的id相同时（说明是博主）
                    if ($_COOKIE['uid'] == $writer) {
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
                <div>
                    <!--内容-->
                    <p>
                        <!--iconv_substr（）是一个可以可以切割中文的函数（要切的对象，从哪开始，切几个）-->
                        <?php echo iconv_substr($arr['content'], 0, 30) ?>...

                    </p>
                    <span style="list-style: none">

                    <?php echo $arr['time'] ?>

                </span>
                </div>

                <div class="templaemo_h_line" style="margin-top: 10px;"></div>

                <?php
            }//whlie
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