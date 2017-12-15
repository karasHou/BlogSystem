<?php

//连接mysql数据库
include "connect.php";


//如果获取到评论id
if (isset($_GET['com_id'])) {
    $cid = $_GET['com_id'];

    //双引号会解析变量，单引号原样输出字符串
    //单双嵌套以最外层为准
    $sql = "delete from comment where com_id = '$cid'";

    $query = mysqli_query($link, $sql);
    if ($query) {

        echo "<script>alert('删除成功！')</script>";
        echo "<script>location='all.php'</script>";


    } else {

        echo "删除失败";

    }

}

?>