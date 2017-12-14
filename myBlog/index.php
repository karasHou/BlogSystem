<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>博客首页</title>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
    <link href="css/style1.css" type="text/css" rel="stylesheet">
    <link type="text/css" href="css/nprogress.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js" type="text/javascript"></script>
    <script src="js/respond.min.js" type="text/javascript"></script>
    <script src="js/selectivizr-min.js" type="text/javascript"></script>
    <![endif]-->
    <link rel="apple-touch-icon-precomposed" href="img/icon1.png">
    <meta name="Keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript">
        //判断浏览器是否支持HTML5
        window.onload = function () {
            if (!window.applicationCache) {
                window.location.href = "ie.html";
            }
        }
    </script>
</head>

<body style="padding-top: 50px">
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
                <li class="active"><a href="#">主页</a></li>
                <li><a href="personal.php?writer=<?php echo "$_COOKIE[uid]" ?>">我的博客空间</a></li>
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
                    echo "<li><a href='ulogin.php?page=1'><strong>注销</strong></a></li>";
                } else {
//                    这里标明index页面为 1
                    echo "<li><a href='login.php?page=1'><span class=\"alert alert-info\" role=\"alert\" style='padding: 10px'>未登录</span></a></li>";
                }
                ?>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<img src="img/banner.jpg" class="img-responsive" alt="" style="height: 150px;width: 100%; margin-top: -50px">


<section class="container user-select">
    <header style="top: 50px">
        <div class="hidden-xs header" style="margin-top: 150px;"><!--超小屏幕不显示-->
            <ul class="nav hidden-xs-nav">
                <li class="active"><a
                            href="http://www.17sucai.com/preview/512263/2016-04-05/%E5%BC%82%E6%B8%85%E8%BD%A9%E5%8D%9A%E5%AE%A28/index.html"><span
                                class="glyphicon glyphicon-home"></span>网站首页</a></li>
                <li><a href=""><span class="glyphicon glyphicon-erase"></span>网站前端</a></li>
                <li><a href=""><span class="glyphicon glyphicon-inbox"></span>后端技术</a></li>
                <li><a href=""><span class="glyphicon glyphicon-globe"></span>管理系统</a></li>
                <li>
                    <a href="http://www.17sucai.com/preview/512263/2016-04-05/%E5%BC%82%E6%B8%85%E8%BD%A9%E5%8D%9A%E5%AE%A28/about.html"><span
                                class="glyphicon glyphicon-user"></span>关于我们</a></li>
                <li>
                    <a href="http://www.17sucai.com/preview/512263/2016-04-05/%E5%BC%82%E6%B8%85%E8%BD%A9%E5%8D%9A%E5%AE%A28/friendly.html"><span
                                class="glyphicon glyphicon-tags"></span>友情链接</a></li>
            </ul>
        </div>
        <!--/超小屏幕不显示-->
        <div class="visible-xs header-xs"><!--超小屏幕可见-->
            <div class="navbar-header header-xs-logo">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#header-xs-menu" aria-expanded="false" aria-controls="navbar"><span
                            class="glyphicon glyphicon-menu-hamburger"></span></button>
            </div>
            <div id="header-xs-menu" class="navbar-collapse collapse">
                <ul class="nav navbar-nav header-xs-nav">
                    <li class="active"><a
                                href="#"><span
                                    class="glyphicon glyphicon-home"></span>网站首页</a></li>
                    <li><a href=""><span class="glyphicon glyphicon-erase"></span>网站前端</a></li>
                    <li><a href=""><span class="glyphicon glyphicon-inbox"></span>后端技术</a></li>
                    <li><a href=""><span class="glyphicon glyphicon-globe"></span>管理系统</a></li>
                    <li>
                        <a href="#"><span
                                    class="glyphicon glyphicon-user"></span>关于我们</a></li>
                    <li>
                        <a href="#"><span
                                    class="glyphicon glyphicon-tags"></span>友情链接</a></li>
                </ul>
                <form class="navbar-form"
                      action="index.php"
                      method="get" style="padding:0 25px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="请输入关键字" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-search" name="sub" type="submit">搜索</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!--/超小屏幕可见-->
    <div class="content-wrap"><!--内容-->
        <div class="content">
            <!--/banner-->
            <div class="content-block new-content">
                <h2 class="title"><strong>最新文章</strong></h2>
                <div class="row">

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
                    $sql = "select * from blog where $w order by time desc";



                    //直接查询返回结果是resource，需要转换成array类型才能正常显示
                    $query = mysqli_query($link, $sql); //查询结果返回resource类型


                    //开始读取，逐行读取，指针下移
                    while ($arr = mysqli_fetch_array($query)) {


                        $writer = $arr['writer'];

                        $sql_writer = "select u.uname from  blog b,user u where $writer = u.uid ";

                        $query_writer = mysqli_query($link, $sql_writer);


                        if ($query_writer)
                            $arr_writer = mysqli_fetch_array($query_writer);

                        ?>

                        <div class="news-list">
                            <div class="news-img col-xs-5 col-sm-5 col-md-3">
                                <a target="_blank" href="">
                                    <img src="img/main (<?php
                                    $num = $arr['bid'] % 5;
                                    echo "$num";
                                    ?>).png" style="width: 100px;"></a>
                            </div>
                            <div class="news-info col-xs-7 col-sm-7 col-md-9">
                                <dl>
                                    <dt>
                                        <a href="" target="_blank">
                                            <a href="all.php?bid=<?php echo $arr['bid'] ?>">
                                                <?php echo $arr['title'] ?>
                                            </a>
                                        </a>
                                    </dt>
                                    <dd>
                                    <span class="name">

                                        <a href="personal.php?writer=<?php echo $arr['writer'] ?>">
                                            <?php echo $arr_writer['uname'] ?>
                                        </a>
                                    </span>
                                        <span class="identity"></span>
                                        <span class="time">
                                         <?php echo $arr['time'] ?>
                                    </span>
                                    </dd>
                                    <dd class="text">
                                        <!--介绍-->
                                        <?php echo iconv_substr($arr['content'], 0, 30) ?>...
                                    </dd>
                                </dl>
                                <div class="news_bot col-sm-7 col-md-8">
                                <span class="look">
                                    访问量: <strong>

                                         <?php echo $arr['hits'] ?>

                                    </strong>
                                </span>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                    ?>


                </div>
                <div class="quotes" style="margin-top:15px">
                    <span class="disabled">首页</span>
                    <span class="disabled">上一页</span>
                    <span class="current">1</span>
                    <a href="">2</a>
                    <a href="">下一页</a>
                    <a href="">尾页</a>
                </div>
            </div>
        </div>
    </div>
    <!--/内容-->


    <aside class="sidebar visible-lg"><!--右侧>992px显示-->
        <div id="search" class="sidebar-block search" role="search">
            <h2 class="title"><strong>搜索</strong></h2>
            <form class="navbar-form" action="index.php" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" size="35" placeholder="请输入关键字" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-search" type="submit" name="sub">搜索</button>
                    </span>
                </div>
            </form>
        </div>


        <div class="sidebar-block recommend">
            <h2 class="title"><strong>热门推荐</strong></h2>
            <ul>

                <?php

                $sql1 = "select * from blog where $w order by hits desc limit 4";

                $query1 = mysqli_query($link, $sql1);

                while ($arr1 = mysqli_fetch_array($query1)) {
                    ?>


                    <li>
                        <a target="_blank" href="all.php?bid=<?php echo $arr1['bid'] ?>">
                        <span class="text">
                             <?php echo $arr1['title'] ?>
                            </span>
                            <span class="text-muted">阅读(<?php echo $arr1['hits'] ?>)</span>
                        </a>
                    </li>


                    <?php
                }
                ?>


            </ul>
        </div>
    </aside>
</section>
<!--<div><a class="gotop" style="display:none;"></a></div>-->
<!--/返回顶部-->
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/nprogress.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
    //页面加载
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function () {
        NProgress.done();
        $('.fade').removeClass('out');
    }, 1000);
    //返回顶部按钮
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".gotop").fadeIn();
            }
            else {
                $(".gotop").hide();
            }
        });
        $(".gotop").click(function () {
            $('html,body').animate({'scrollTop': 0}, 500);
        });
    });
    //提示插件启用
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    //鼠标滑过显示 滑离隐藏
    $(function () {
        $(".carousel").hover(function () {
            $(this).find(".carousel-control").show();
        }, function () {
            $(this).find(".carousel-control").hide();
        });
    });
    $(function () {
        $(".hot-content ul li").hover(function () {
            $(this).find("h3").show();
        }, function () {
            $(this).find("h3").hide();
        });
    });
    //页面元素智能定位
    $.fn.smartFloat = function () {
        var position = function (element) {
            var top = element.position().top; //当前元素对象element距离浏览器上边缘的距离
            var pos = element.css("position"); //当前元素距离页面document顶部的距离
            $(window).scroll(function () { //侦听滚动时
                var scrolls = $(this).scrollTop();
                if (scrolls > top) { //如果滚动到页面超出了当前元素element的相对页面顶部的高度
                    if (window.XMLHttpRequest) { //如果不是ie6
                        element.css({ //设置css
                            position: "fixed", //固定定位,即不再跟随滚动
                            top: 56 //距离页面顶部为0
                        }).addClass("shadow"); //加上阴影样式.shadow
                    } else { //如果是ie6
                        element.css({
                            top: scrolls  //与页面顶部距离
                        });
                    }
                } else {
                    element.css({ //如果当前元素element未滚动到浏览器上边缘，则使用默认样式
                        position: pos,
                        top: top
                    }).removeClass("shadow");//移除阴影样式.shadow
                }
            });
        };
        return $(this).each(function () {
            position($(this));
        });
    };
    //启用页面元素智能定位
    $(function () {
        $("#search").smartFloat();
    });
    //异步加载更多内容
    jQuery("#pagination a").on("click", function () {
        var _url = jQuery(this).attr("href");
        var _text = jQuery(this).text();
        jQuery(this).attr("href", "javascript:viod(0);");
        jQuery.ajax(
            {
                type: "POST",
                url: _url,
                success: function (data) {
                    //将返回的数据进行处理，挑选出class是news-list的内容块
                    result = jQuery(data).find(".row .news-list");
                    //newHref获取返回的内容中的下一页的链接地址
                    nextHref = jQuery(data).find("#pagination a").attr("href");
                    jQuery(this).attr("href", _url);
                    if (nextHref != undefined) {
                        jQuery("#pagination a").attr("href", nextHref);
                    }
                    else {
                        jQuery("#pagination a").html("下一页没有了").removeAttr("href")
                    }
                    // 渐显新内容
                    jQuery(function () {
                        jQuery(".row").append(result.fadeIn(300));
                        jQuery("img").lazyload(
                            {
                                effect: "fadeIn"
                            });
                    });
                }
            });
        return false;
    });
</script>


</body>
</html>