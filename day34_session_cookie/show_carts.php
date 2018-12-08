<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 10:29
 */

//读取购物车信息

session_start();
if(!isset($_SESSION['cart'])){
    die('您还未添加任何商品哦O(∩_∩)O');
}
foreach ($_SESSION['cart'] as $k=>$v){
    echo '您购买了:<br>'.$k.'，数量是'.$v.'<br>';
}