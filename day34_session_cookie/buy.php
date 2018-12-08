<?php

//如果购买了该商品就++数量，否则加入购物车

$book = isset($_GET['name'])?$_GET['name']:'';
//讲商品保存到session
session_start();
if(isset($_SESSION['cart'][$book])){
    //已经购买了，数量++
    $_SESSION['cart'][$book]++;
}else{
    //说明没有购买过，数量为1
    $_SESSION['cart'][$book] = 1;
}
echo '购买成功';
