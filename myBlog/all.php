<!-- 点击一个文章的标题展示的详情页面-->

<!--1、访问量+1，显示当前页-->

<?php

include "connect.php";

if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $sql = "update blog set hits=hits+1 where bid = '$bid'";
    $query = mysqli_query($link, $sql);
    if ($query) {
        //显示当前页
        $sql = "select * from blog where bid='$bid'";
        $query = mysqli_query($link, $sql);
        //得到转换后的数组
        $arr = mysqli_fetch_array($query);

    }


}


?>

<button type="button" onclick="window.location.href='index.php'">返回主页</button>

<h3>标题：<?php echo $arr['title'] ?></h3>
<li style="list-style: none">时间：<?php echo $arr['time'] ?></li>
<span>访问量：<?php echo $arr['hits'] ?></span>

<p>内容：<?php echo $arr['content'] ?></p>
<hr/>