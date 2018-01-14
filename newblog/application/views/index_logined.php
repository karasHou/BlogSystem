<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url() ?>">

    <title><?php
        $user = $this->session->userdata('user');

        echo $user->username;

        ?>'s 个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script type="text/javascript" src="assets/js/jquery-1.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery_002.js"></script>
    <script type="text/javascript" src="assets/js/oschina.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.11.2.js"></script>

    <style type="text/css">
        body, table, input, textarea, select {
            font-family: Verdana, sans-serif, 宋体;
        }
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {
    padding: 3px 10px 3px 10px;
}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {
    padding: 3px 10px 4px 10px;
}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <div id="OSC_Banner">
        <div id="OSC_Slogon"><?php


            if (isset($user)) {
                echo $user->username;
            }

            ?>'s Blog
        </div>
        <div id="OSC_Channels">
            <ul>
                <li><a href="#" class="project">心情 here...</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div><!-- #EndLibraryItem -->
    <div id="OSC_Topbar">
        <div id="VisitorInfo">
            当前访客身份：
            <?php


            if (isset($user)) {
                echo $user->username;
            }

            ?>[ <a href="User/exit_login">退出</a> ]

        </div>
        <div id="SearchBar">
            <form action="#">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索"
                       onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value"
                       onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content">
        <div class="SpaceChannel">
            <div id="portrait"><a href="Article/createblog"><img src="assets/images/portrait.gif" alt="Johnny"
                                                                 title="Johnny"
                                                                 class="SmallPortrait" user="154693" align="absmiddle"></a>
            </div>
            <div id="lnks">
                <strong><?php


                    if (isset($user)) {
                        echo $user->username;
                    }

                    ?>的博客</strong>
                <div><a href="index_logined.htm">TA的博客列表</a>&nbsp;|
                    <a href="sendMsg.htm">发送留言</a></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="BlogList">
            <ul>
                <?php
                if (isset($list))
                    foreach ($list as $article) {
                        ?>
                        <li class='Blog' id='blog_24027'>

                            <h2 class='BlogAccess_true BlogTop_0'><a
                                        href="viewPost_comment.htm"><?php echo $article->title ?></a></h2>

                            <div class='outline'>

                                <span class='time'>发表于 <?php echo $article->post_date ?></span>

                                <span class='catalog'>分类: <a href="?catalog=92334"><?php echo $article->type_name ?></a></span>

                                <span class='stat'>统计: 0评/<?php echo $article->clicked ?>阅</span>

                            </div>

                            <div class='TextContent' id='blog_content_24027'>

                                <?php echo $article->content ?>

                                <div class='fullcontent'><a href="viewPost_comment.htm">阅读全文...</a></div>

                            </div>

                        </li>

                    <?php } ?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="BlogMenu">
            <div class="admin SpaceModule">
                <strong>博客管理</strong>
                <ul class="LinkLine">
                    <li><a href="Article/createblog">发表博客</a></li>
                    <li><a href="blogCatalogs.htm">博客分类管理</a></li>
                    <li><a href="blogs.htm">文章管理</a></li>
                    <li><a href="blogComments.htm">网友评论管理</a></li>
                </ul>
            </div>
            <div class="catalogs SpaceModule">
                <strong>博客分类</strong>
                <ul class="LinkLine">
                    <li><a href="#">工作日志(3)</a></li>
                    <li><a href="#">日常记录(0)</a></li>
                    <li><a href="#">转贴的文章(0)</a></li>
                </ul>
            </div>
            <div class="comments SpaceModule">
                <strong>最新网友评论</strong>
                <ul>
                    <li>
                        <span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
                        <span class="c">hoho
			<span class="t">发布于 11分钟前 <a href="viewPost_comment.htm">查看»</a></span>
		</span>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
                        <span class="c">测试评论111
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny"
                                                         class="SmallPortrait" user="154693"
                                                         align="absmiddle"></a></span>
                        <span class="c">测试评论
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>
                        <div class="clear"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="assets/js/brush.js"></script>
        <link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
        <link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
        <script type="text/javascript">
            $(document).ready(function () {
                SyntaxHighlighter.config.clipboardSwf = 'assets//js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
                SyntaxHighlighter.all();
            });

        </script>
        <script type="text/javascript">


        </script>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© howuei</div>
</div>
</div>
<script type="text/javascript" src="assets/js/space.htm" defer="defer"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $('a.fancybox').fancybox({titleShow: false});
    });

</script>
</body>
</html>