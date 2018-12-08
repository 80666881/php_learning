<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 21:36
 */

//通过PDO类实例化PDO对象

//参数1：数据源
//参数2：用户名
//参数3：密码
//phpinfo();

//不仅可以连接mysql类型的数据库，还可以连接oracle，mssql等其他数据库
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
//
$pdo = new PDO($dsn,$user,$pass);


//通过PDO连接、操作数据库，分为2种格式：
//1.执行增删改的操作，通过pdo对象的exec()方法实现：通常返回受影响的记录数

//增加一条记录

$sql = "INSERT INTO user VALUES(NULL,'admin','admin123')";
$row = $pdo->exec($sql);
var_dump($row);

//2.通过pdo对象的query方法实现，返回的是PDOStatement类的对象，该对象代表一个预处理的语句对象，将sql语句的结构部分缓存了

