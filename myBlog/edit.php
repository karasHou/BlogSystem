<!--过程：-->
<!--1、先按照点击的ID的数据填充到form表单中-->
<!--2、修改文章内容-->
<!--3、点击“修改文章”按钮-->
<!--4、请求传送至本页面（edit.php），数据库更新该修改后的信息-->
<!--5、跳转至主页面（index.php）-->

<?php
//连接mysql数据库
include "connect.php";

//========处理get提交=========
//如果获取到bid
if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    //首先获取该id的数据用于填充
    $sql = "select * from blog where bid = '$bid'";

    $query = mysqli_query($link, $sql);
    if ($query) {
        $arr = mysqli_fetch_array($query);
        $htmlData = $arr['content'];
    }
}

//点击修改文章后页面会刷新，传的bid没有了
//解决，使用一个新的input在传，再接收（hidden）。

//========处理post提交=========
if (isset($_POST['sub'])) {
    $title = $_POST['title'];

    if (get_magic_quotes_gpc()) {
        $con = stripslashes($_POST['content1']);
    } else {
        $con = $_POST['content1'];
    }

    $hid = $_POST['hid'];   //取出传的bid


    $sql = "update blog set title = '$title' , content = '$con' where bid='$hid'";

    $query = mysqli_query($link, $sql);

    if ($query) {

        //header方式跳转页面
        header("location:personal.php");

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
         style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;padding: 15px;height: 100%; width: 800px;margin: 40px auto;background: #fdfeff;z-index: 1000;position: relative;opacity: .8;">
        <h3>编辑文章</h3>

        <form name="example" method="post" action="edit.php">
            标题：<input type="text" style="margin-bottom: 20px;width: 200px;" name="title"
                      value="<?php echo $arr['title'] ?>" autofocus>
            <textarea name="content1" style="width:700px;height:200px;visibility:hidden;">
            <?php echo htmlspecialchars($htmlData); ?>
            </textarea>
            <br/>
            <!--            隐藏的input输入框，用于保存$uid-->
            <input type="hidden" name="hid" value="<?php echo $bid; ?>">
            <input type="submit" name="sub" value="提交内容"
                   style="color: #212d25;background: #c9fab9;border: none;border-radius: 5px;"/> <span
                    style="font-size: 15px; ">(快捷键: Ctrl + Enter)</span>
            <button type="button" onclick="window.location.href='personal.php'"
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


