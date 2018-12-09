<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 11:31
 */

$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

$str = "hello 'zhangsan'";
//对字符串的内容进行转义并包裹,有效防止sql注入

$res = $pdo->quote($str);

echo '<pre>';
var_dump($res);//"'hello \'zhangsan\''"
