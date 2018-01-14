<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>文章管理界面</title>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/styles-manage.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">


            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

                <ul class="nav">
                    <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i
                                    class="glyphicon glyphicon-chevron-right"></i></a></li>
                </ul>

                <ul class="nav hidden-xs" id="lg-menu">
                    <li class="active"><a href="#"><i class="glyphicon glyphicon glyphicon-list"></i> Article
                            Management</a></li>
                    <li><a href="User.html"><i class="glyphicon glyphicon-paperclip"></i> User Management</a></li>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                        <h3>Make better！</h3>
                    </li>
                </ul>


            </div>
            <!-- /sidebar -->

            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">


                <!-- top nav -->
                <div class="navbar navbar-blue navbar-static-top">
                    <div class="navbar-header">
                    </div>
                    <nav class="collapse navbar-collapse" role="navigation">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon glyphicon-user"> </i> </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /top nav -->
                <div class="copyrights">houwei</div>
                <div class="padding">
                    <div class="full col-sm-9">

                        <div class="row">
                            <table class="table table-hover">
                                <caption>文章列表</caption>
                                <thead>
                                <!--                                列头-->
                                <tr>
                                    <th>ID</th>
                                    <th>文章标题</th>
                                    <th>摘要</th>
                                    <th>发表时间</th>
                                    <th>作者</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--以下为需要循环的内容-->

                                <?php

                                session_start();

                                include "connect.php";

                                $sql = "select * from blog order by time desc";

                                $query = mysqli_query($link, $sql);


                                while ($arr = mysqli_fetch_array($query)) {


                                    $writer = $arr['writer'];

                                    $sql_writer = "select u.uname from  blog b,user u where $writer = u.uid ";

                                    $query_writer = mysqli_query($link, $sql_writer);


                                    if ($query_writer)
                                        $arr_writer = mysqli_fetch_array($query_writer);

                                    ?>


                                    <tr>
                                        <th scope="row">
                                            <?php echo $arr['bid']; ?>

                                        </th>

                                        <td>
                                            <a href="all.php?bid=<?php echo $arr['bid'] ?>">
                                                <?php echo $arr['title'] ?>
                                            </a>
                                        </td>

                                        <td>
                                            <?php echo iconv_substr($arr['content'], 0, 10) ?>...
                                        </td>

                                        <td>
                                            <?php echo $arr['time'] ?>
                                        </td>

                                        <td>
                                            <?php echo $arr_writer['uname'] ?>
                                        </td>
                                        <td>
                                            <?php

                                            echo "<a href=\"del_admin.php?bid=" . $arr['bid'] . "\" style=\"text-decoration: none\"> 删除</a>"

                                            ?>

                                        </td>

                                    </tr>


                                    <?php


                                }


                                ?>

                                </tbody>
                            </table>

                        </div>


                    </div>


                </div><!-- /col-9 -->
            </div><!-- /padding -->
        </div>
        <!-- /main -->


    </div>
</div>
</div>


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts-m.js"></script>
</body>
</html>