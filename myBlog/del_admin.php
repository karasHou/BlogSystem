<?php

//连接mysql数据库
include "connect.php";


//如果获取到bid
if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    //双引号会解析变量，单引号原样输出字符串
    //单双嵌套以最外层为准
    $sql = "delete from blog where bid = '$bid'";

//    echo $sql;
//    die();

    $query = mysqli_query($link, $sql);
    if ($query) {

        //删除文章的相关评论
        $sql_c = "delete from comment where article_id = '$bid'";
        $query_c = mysqli_query($link, $sql_c);

        if ($query_c) {
            $uid = $_COOKIE['uid'];
            echo "<script>location='Article.php'</script>";
            echo "<script>alert('删除成功！')</script>";
        } else {

            echo "<script>alert('删除失败!请稍后重试或联系管理员')</script>";

        }
    } else {
        echo "<script>alert('删除失败!')</script>";

    }

}

?>