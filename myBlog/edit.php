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

    $arr = mysqli_fetch_array($query);
}

//点击修改文章后页面会刷新，传的bid没有了
//解决，使用一个新的input在传，再接收（hidden）。

//========处理post提交=========
if (isset($_POST['sub'])) {
    $title = $_POST['title'];
    $con = $_POST['con']; //注意这里取得数据是从form表单过来的，名字是name属性
    $hid = $_POST['hid'];   //取出传的bid

    $sql = "update blog set title = '$title' , content = '$con' where bid='$hid'";

    $query = mysqli_query($link, $sql);

    if ($query) {

        //header方式跳转页面
        header("location:index.php");

    }

}


?>


<!--显示在界面上的表单部分-->
<meta charset="UTF-8">
<form action="edit.php" method="post">
    <p>
        标题：<input type="text" name="title" value="<?php echo $arr['title'] ?>"><br/>
    </p>
    <p>
        内容：<textarea name="con" cols="30" rows="10"><?php echo $arr['content'] ?></textarea><br/>
    </p>
    <input type="hidden" name="hid" value="<?php echo $bid; ?>">
    <input type="submit" name="sub" value="修改文章">
</form>




