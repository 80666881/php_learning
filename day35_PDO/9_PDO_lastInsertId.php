<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 16:48
 */

//该方法是用来获得上次执行插入操作的主键的值,必须是在同个文件下刚刚操作完的

$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

$sql = "INSERT INTO user VALUES(null,'赵六','abc123')";
$pdo->exec($sql);
$lastInsertId = $pdo->lastInsertId();

echo $lastInsertId;