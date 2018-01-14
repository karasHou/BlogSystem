<!--添加评论的处理文件-->

<?php

session_start();

if (!$_SESSION['uid']) {
    //未登录，跳转至登录界面
    echo "<script>alert('请先登录！')</script>";
    echo "<script>location = 'login.php?page=3'</script>";

}

include "connect.php";

if (isset($_POST['sub'])) {

    if (isset($_POST['content'])) {

        if ($_POST['content'] == "") {
            echo "<script>alert('内容不能为空！')</script>";
        } else {

            //传来bid

            $content = $_POST['content'];    //获取评论内容
            $bid = $_POST['hid'];   //获取文章id

            //评论者id
            $uid = $_SESSION['uid'];

            //查询文章作者id(根据文章id)
            $sql_w = "select writer from blog where bid = '$bid'";

            $query_w = mysqli_query($link, $sql_w);

            if ($query_w) {

                $arr_w = mysqli_fetch_array($query_w);
                $holder_id = $arr_w['writer'];


//                开始插入评论

                $sql = "insert into comment(com_id,content,post_date,article_id,user_id,holder_id) values(null,'$content',now(),'$bid','$uid','$holder_id')";


                $query = mysqli_query($link, $sql);

                //查询成功
                if ($query) {

                    echo "<script>alert('添加评论成功！')</script>";

                } else {

                    echo "<script>alert('添加评论失败！')</script>";

                }


            }


        }

    }

    echo "<script>location = 'all.php?bid = $bid'</script>";


}

?>