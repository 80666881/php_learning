<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 9:27 PM
 */

//1.得到一个php=>mysql的连接
$mysqli = new mysqli('localhost:3306','root','1001133','learning_mysql');

//2.设置字符集
$mysqli->set_charset('utf8');

//3.编写sql

$sql1 = "UPDATE `account` SET money = money -1 WHERE id = 100";
$sql2 = "UPDATE `account` SET money = money +1 WHERE id = 200";


//$mysqli->begin_transaction();
$mysqli->autocommit(false);

$res1 = $mysqli->query($sql1);
$res2 = $mysqli->query($sql2);
if($res1 && $res2){
    echo '<br>执行成功，正式提交';
    $mysqli->commit();
}else{
    echo '<br>执行失败。回滚';
    $mysqli->rollback();
}

