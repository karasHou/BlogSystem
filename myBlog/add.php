<!--添加文章的页面-->

<?php

//引入php文件
include "connect.php";
//确认是否提交
if (isset($_POST['sub'])) {
    $title = $_POST['title'];
    $con = $_POST['con'];

    //    输出标题
    //    echo $title . "<br/>";
    //    输出内容
    //    echo $con;

    //写入数据库
    //1、拼字符串
    $sql = "insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
    //如果出现bug，可以先把sql语句输出，然后复制命令到navicat中使用查询。
    //echo $sql;
    //2、发送sql语句
    $query = mysqli_query($link, $sql);
    //查询语句有返回值
    if ($query) {
        //查询成功,跳转(或使用head也可以)
        echo "<script>location='index.php'</script>";

    } else {
        echo "<script>alert('插入失败')</script>";
        echo "<script>location ='add.php'</script>";
    }
}

?>


<meta charset="UTF-8">
<form action="add.php" method="post">
    <p>
        标题：<input type="text" name="title" autofocus><br/>
    </p>
    <p>
        内容：<textarea name="con" id="" cols="30" rows="10"></textarea><br/>
    </p>
    <input type="submit" name="sub" value="添加文章">
</form>