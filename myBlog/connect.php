<!--连接数据库的页面-->

<?php

//       1、连接数据库
//@忽略错误提示
@$link = mysqli_connect("localhost", "root", "") or die("数据库连接错误");

//        2、选择数据库
@mysqli_select_db($link, "liuyan2") or die("打开数据库错误");

//        3、设置传输编码
mysqli_set_charset($link, "UTF8");

