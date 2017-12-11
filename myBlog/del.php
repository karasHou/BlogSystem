<!--删除指定id的文章的页面-->

<?php

//连接mysql数据库
include "connect.php";


//如果获取到bid
if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    //双引号会解析变量，单引号原样输出字符串
    //单双嵌套以最外层为准
    $sql = "delete from blog where bid = '$bid'";

    $query = mysqli_query($link, $sql);
    if ($query) {
        echo "<script>location='index.php'</script>";
    } else {

        echo "删除失败";

    }

}

?>