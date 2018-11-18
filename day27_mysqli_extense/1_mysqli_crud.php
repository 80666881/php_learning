<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/10
 * Time: 10:42 AM
 */

header('content-type:text/html;charset=utf-8');

/*
 * 创建一张测试表
 * CREATE TABLE `user3`(
 * id int unsigned primary key auto_increment,
 * name varchar(64) not null default '',
 * pwd char(32) not null default '',
 * email varchar(64) unique not null,
 * birthday date not null
 * )charset=utf8 engine=myisam;
 *
 * INSERT INTO `user3` VALUES(null,'张三',md5('abc'),'zs@sohu.com',current_date());
 *
 * INSERT INTO `user3` VALUES(null,'李四',md5('abc'),'ls@sohu.com','2001-12-12');
 * */
//phpinfo();


//1.得到一个php=>mysql的连接
$mysqli = new mysqli('mysql','root','root','mysql',3306);

var_dump($mysqli);
////2.设置字符集
$mysqli->set_charset('utf8');

////3.拼接sql语句
$sql = 'SELECT * FROM `db`';
//
////4.执行sql语句
////$res是mysql_result的对象
$res = $mysqli->query($sql);
//
////5.显示数据的时候,使用$res来循环取出
while($row = $res->fetch_assoc()){
    echo '<pre>';
    var_dump($row);
}
//
////6.释放相关资源，如果不主动释放，系统也会自动释放
//var_dump($res);