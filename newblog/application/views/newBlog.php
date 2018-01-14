<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url() ?>">
    <title>
        <?php

        $user = $this->session->userdata('user');

        if (isset($user)) {
            echo $user->username;
        } else {
            echo "我";
        }

        ?>

        个人博客</title>
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
        <div id="OSC_Slogon">
            <?php

            $user = $this->session->userdata('user');

            if (isset($user)) {
                echo $user->username;
            } else {
                echo "我";
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
            <?php

            if (isset($user)) {
                echo $user->username;
                echo "<a href=\"User/exit_login\">[退出]</a> ";
            } else {
                echo "游客 <a href=\"User/login\">登录</a> | <a href=\"User/reg\">注册</a>";
            }

            ?>
            <span id="OSC_Notification">
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
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
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="index_logined.htm">返回我的首页</a>&nbsp;»
                <span id="AdminTitle">发表博客</span>
            </div>
            <div id="AdminMenu">
                <ul>
                    <li class="caption">个人信息管理
                        <ol>
                            <li><a href="inbox.htm">站内留言(0/1)</a></li>
                            <li><a href="profile.htm">编辑个人资料</a></li>
                            <li><a href="chpwd.htm">修改登录密码</a></li>
                            <li><a href="userSettings.htm">网页个性设置</a></li>
                        </ol>
                    </li>
                </ul>
                <ul>
                    <li class="caption">博客管理
                        <ol>
                            <li class="current"><a href="newBlog.htm">发表博客</a></li>
                            <li><a href="blogCatalogs.htm">博客设置/分类管理</a></li>
                            <li><a href="blogs.htm">文章管理</a></li>
                            <li><a href="blogComments.htm">博客评论管理</a></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div id="AdminContent">
                <div class="MainForm">
                    <form id="BlogForm" action="Article/insert_article" method="POST">
                        <input id="hdn_blog_id" name="draft" value="0" type="hidden">
                        <table>
                            <tbody>
                            <tr>
                                <td class="t">标题（必填）</td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="title" id="f_title" class="TEXT" style="width: 400px;" type="text">
                                    存放于
                                    <select name="catalog">
                                        <?php

                                        if (isset($types))
                                            foreach ($types as $type) {
                                                echo " <option selected=\"selected\" value=\".$type->type_id.\">$type->type_name</option>";
                                                echo $type->type_name;
                                            } else echo '11111111111111111111';

                                        ?>

                                        <a href="blogCatalogs.htm"
                                           onclick="return confirm('是否放弃当前编辑进入分类管理？');">分类管理»</a>
                                </td>
                            </tr>
                            <tr>
                                <td class='t'>内容（必填）
                                    <span id='save_draft_msg' style='display:none;color:#666;'></span>

                                </td>
                            </tr>

                            <tr>

                                <td><textarea name="content" id="ta_blog_content"
                                              style="width:750px;height:300px;"></textarea></td>
                            </tr>


                            <tr class="submit">
                                <td>
                                    <input value=" 发 表 " class="BUTTON SUBMIT" type="submit">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <script type='text/javascript' src='assets/kindeditor/kindeditor-min.js' charset='utf-8'></script>


                <script type='text/javascript'>


                    $(document).ready(function () {

                        KE.lang['code'] = "插入程序代码或脚本";

                        KE.plugin['code'] = {

                            click: function (id) {

                                KE.util.selection(id);

                                var dialog = new KE.dialog({

                                    id: id,

                                    cmd: 'code',

                                    file: 'code/insert_code.html',

                                    width: 530,

                                    height: 300,

                                    title: KE.lang['code'],

                                    yesButton: KE.lang['yes'],

                                    noButton: KE.lang['no']

                                });

                                dialog.show();

                            },

                            check: function (id) {

                                var dialogDoc = KE.util.getIframeDoc(KE.g[id].dialog);

                                var lang = KE.$('ic_lang', dialogDoc).value;

                                var source = KE.$('ic_source', dialogDoc).value;

                                if (lang == '') {

                                    alert('编程语言必须选择');

                                    return false;

                                }

                                if (source == '') {

                                    alert('请输入程序代码或者脚本');

                                    return false;

                                }

                                return true;

                            },

                            exec: function (id) {

                                KE.util.select(id);

                                var iframeDoc = KE.g[id].iframeDoc;

                                var dialogDoc = KE.util.getIframeDoc(KE.g[id].dialog);

                                if (!this.check(id)) return false;

                                var lang = KE.$('ic_lang', dialogDoc).value;

                                var source = KE.$('ic_source', dialogDoc).value;

                                this.insert(id, lang, source);

                            },

                            insert: function (id, lang, source) {


                                html += html_encode(source);

                                html += '</pre>';

                                KE.util.insertHtml(id, html);

                                KE.layout.hide(id);

                                KE.util.focus(id);

                            }

                        };

                    });


                </script>

                <script type='text/javascript'>


                    $(document).ready(function () {

                        KE.show({

                            id: 'ta_blog_content',

                            resizeMode: 1,

                            shadowMode: false,

                            allowPreviewEmoticons: false,

                            allowUpload: true,

                            syncType: 'auto',

                            urlType: 'domain',

                            cssPath: 'assets/css/ke-oschina.css',

                            imageUploadJson: '/action/blog/upload_img',

                            items: ['bold', 'italic', 'underline', 'strikethrough', 'removeformat', '|', 'textcolor', 'bgcolor',

                                'title', 'fontname', 'fontsize', '|',

                                'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|',

                                'code', 'image', 'flash', 'emoticons', 'link', 'unlink', '|', 'selectall', 'source', 'about'

                            ]

                        });

                    });


                </script>

            </div>

            <div class='clear'></div>

        </div>

        <script type='text/javascript'>


            $(document).ready(function () {

                $('#AdminTitle').text('发表博客');

            });


        </script>
        <div class="clear"></div>
        <div id="OSC_Footer">© houwei</div>
    </div>
</body>
</html>