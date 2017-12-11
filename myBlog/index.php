<!--主页：-->
<!--提供展示文章详情和搜索的功能-->

<!--数据库设计-->
<!--blog(bid,title,content,time,hits,writer)-->
<!--user(uid,uname,pass,band(权限))-->
<button type="button" onclick="window.location.href='add.php'">添加文章</button>
<span>
    <?php
    //如果cookie中有值
    if ($_COOKIE['uid']) {
        echo $_COOKIE['uname'] . '已登录  ';
        echo "<a href='ulogin.php'>注销</a>";
    } else {
        echo "<a href='login.php'>未登录</a>";
    }
    ?>
</span>
<br/>
<br/>
<!--提供搜索功能，提交给index.php，方式g：et-->
<form action="index.php" method="get">
    <input type="text" name="search">&nbsp;&nbsp;
    <input type="submit" name="sub" value="搜索">
</form>


<?php
//多次使用
include "connect.php";
if (isset($_GET['search'])) {
    //如果有待搜索的文字
    $like = $_GET['search'];
    //用于模糊查询
    $w = "title like '%$like%'";
} else {
    //显示全部
    $w = 1;
//    select * from blog where 1 也是显示全部
}

//排序：asc正序  desc倒序
$sql = "select * from blog where $w order by bid desc";

//限制2条
//    $sql = "select * from blog order by bid desc limit 2";

//直接查询返回结果是resource，需要转换成array类型才能正常显示
$query = mysqli_query($link, $sql); //查询结果返回resource类型

// $arr = mysqli_fetch_array($query);  将resource解析成array类型

//开始读取，逐行读取，指针下移
while ($arr = mysqli_fetch_array($query)) {
    ?>
    <!--这里的php标签可以写多个，循环中间的html代码        -->
    <!--标题-->
    <h3>
        <!--del.php?bid=xx  这是一个get请求-->
        <a href="all.php?bid=<?php echo $arr['bid'] ?>">
            《
            <?php echo $arr['title'] ?>
            》
        </a>
        |
        <a href="del.php?bid=<?php echo $arr['bid'] ?>">
            删除
        </a>
        |
        <a href="edit.php?bid=<?php echo $arr['bid'] ?>">
            修改
        </a>
    </h3>
    <!--内容-->
    <p>
        <!--iconv_substr（）是一个可以可以切割中文的函数（要切的对象，从哪开始，切几个）-->
        <?php echo iconv_substr($arr['content'], 0, 4) ?>...

    </p>
    <li style="list-style: none">

        <?php echo $arr['time'] ?>

    </li>
    <hr/>
    <?php
}
?>
