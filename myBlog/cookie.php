<?php
//cookie不写生存周期默认是浏览器的生存周期

//设置cookie值
//    setcookie('name','houwei');//写文件需要时间

if (isset($_COOKIE['name'])) {
    echo "true";
}


?>