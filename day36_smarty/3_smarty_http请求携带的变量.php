<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 12:43
 */
date_default_timezone_set('PRC');

require_once 'smarty/Smarty.class.php';

$smarty = new Smarty();

//cookie数据
setcookie('is_login','on',time()+60);
session_start();
//session数据
$_SESSION['cart'] = '笑傲江湖';


$smarty->display('templates/3_smarty_http.html');