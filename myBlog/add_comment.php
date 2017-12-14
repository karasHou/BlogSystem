<!--添加评论的处理文件-->

<?php

if (!$_COOKIE['uid']) {
    //未登录，跳转至登录界面
    echo "<script>alert('请先登录！')</script>";
    echo "<script>location = 'login.php?page=3'</script>";

}

include "connect.php";

if (isset($_POST['sub'])) {
    //传来bid

    $content = $_POST['content'];    //获取评论内容
    $bid = $_POST['hid'];   //获取文章id

    $uid = $_COOKIE['uid'];

    $sql = "insert into comment(com_id,content,post_date,article_id,user_id) values(null,'$content',now(),'$bid','$uid')";
//        echo $sql;
//        die();

    $query = mysqli_query($link, $sql);

    //查询成功
    if ($query) {

        echo "<script>alert('添加评论成功！')</script>";

    } else {

        echo "<script>alert('添加评论失败！')</script>";

    }

    echo "<script>location = 'all.php?bid = $bid'</script>";


}

?>