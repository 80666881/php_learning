<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 10:41
 */

//通过PDO对象的errInfo获取sql语句错误信息（包括错误代码号），errCode获取错误代码

//因为平常查询不到直接返回false，我们并不知道错误具体原因
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

$sql = "SELECT * FORM user";

$statement = $pdo->query($sql);
//获取错误信息
if(!$statement){
    $err = $pdo->errorInfo();
    echo '<pre>';
    var_dump($err);
}else{
    //...进行fetch操作
}
