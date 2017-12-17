<?php
if (isset($_COOKIE['uid'])) {
    //保存用户的uid值
    $uid = $_COOKIE['uid'];
}

include "connect.php";
$htmlData = ''; //要显示的变量
//当$_POST['content1']不为空
if (!empty($_POST['content1'])) {

    if (get_magic_quotes_gpc()) {
        $htmlData = stripslashes($_POST['content1']);
    } else {
        $htmlData = $_POST['content1'];
    }
    //得到内容$htmlData

    //得到标题
    $title = $_POST['title'];
    //写入数据库
    //1、拼字符串
    $sql = "insert into blog(bid,title,content,time,writer) values(null,'$title','$htmlData',now(),'$uid')";

    //2、发送sql语句
    $query = mysqli_query($link, $sql);
    //查询语句有返回值
    if ($query) {
        $writer = $_COOKIE['uid'];
        //查询成功,跳转(或使用head也可以)
        echo "<script>alert('添加成功')</script>";
        echo "<script>location = " . "'personal.php?writer=$writer'" . ";</script>";
    } else {
        echo "<script>alert('插入失败')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加文章</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>

    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="themes/default/default.css"/>
    <link rel="stylesheet" href="plugins/code/prettify.css"/>
    <script charset="utf-8" src="js/kindeditor.js"></script>
    <script charset="utf-8" src="lang/zh_CN.js"></script>
    <script charset="utf-8" src="plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function (K) {
            var editor1 = K.create('textarea[name="content1"]', {
                uploadJson: '../php/upload_json.php',
                fileManagerJson: '../php/file_manager_json.php',
                allowFileManager: true,
                afterCreate: function () {
                    var self = this;
                    K.ctrl(document, 13, function () {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function () {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
</head>
<body>
<div class="container demo-1" style="position: relative">
    <div class="content" style="position: fixed; top: 0;">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
        </div>
    </div>

    <!--主体内容展示-->
    <div id="content"
         style="border-radius:10px;padding: 20px;height: 100%; width: 800px;margin: 20px auto;background: #fdfeff;z-index: 1000;position: relative;opacity: .9;">
        <h3>添加文章</h3>

        <form name="example" method="post" action="add.php">
            标题：<input type="text" style="margin: 10px;width: 200px;" name="title" autofocus>

            <textarea name="content1" style="margin: 20px;width:700px;height:200px;visibility:hidden;">
            <?php echo htmlspecialchars($htmlData); ?>
        </textarea>
            <br/>
            <input type="submit" name="button" value="提交内容"
                   style="color: #212d25;background: #c9fab9;border: none;border-radius: 5px;"/> (快捷键: Ctrl + Enter)
            <button type="button" onclick="window.location.href='personal.php?writer=<?php echo $uid; ?>'"
                    style="color: #212d25;border: none;border-radius: 5px;background: #c4ddff;">
                返回
            </button>
        </form>

    </div>
    <!--主体内容展示-->

</div><!-- /container -->
<script src="js/TweenLite.min.js"></script>
<script src="js/EasePack.min.js"></script>
<script src="js/rAF.js"></script>
<script src="js/demo-1.js"></script>
</body>
</html>