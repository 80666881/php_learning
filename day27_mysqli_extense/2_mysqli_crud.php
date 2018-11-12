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

//1.得到一个php=>mysql的连接
$mysqli = new mysqli('localhost:3306','root','1001133','learning_mysql');

//2.设置字符集
$mysqli->set_charset('utf8');
//3.拼接sql语句
//insert
$sql = "INSERT INTO `user3` VALUES(NULL,'王五',md5('abc'),'w5-2@sohu.com','2011-11-11')";

//重新定义会覆盖$sql
//$sql = "UPDATE `user3` SET email='ww2@sohu.com' where id = 3";

//$sql = "DELETE FROM `user3` where id=3 ";


//4.如果执行的是一个dml语句，成功返回true，失败返回false
$res = $mysqli->query($sql);
if($res){
    echo '<br>执行成功';
}else{
    echo('<br>执行失败,sql语句是'. $sql);
    echo('<br>失败的原因是'.$mysqli->error);
    exit;
}
//判断是否真正地影响数据库
if($mysqli->affected_rows > 0){
    echo '<br>对表真正进行了改变';
}else{
    echo '<br>没有对表造成影响';
}

/*  如何获取自增长字段id的值
    比如前面的王五的id
    $mysql->insert_id
*/
echo '<br> id='. $mysqli->insert_id;