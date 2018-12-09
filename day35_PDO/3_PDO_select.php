<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 22:24
 */



$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

//查询数据，使用query方法，并没有直接返回所有的数据
//而是返回了预编译对象，也就是PDOStatement对象
$sql = "SELECT * FROM user";

//这个对象是一个代表预处理的语句，将sql语句的结构部分缓存了
$pdo_statement = $pdo->query($sql);

/*statement提供的方法
 *  1.fetch()获取一条数据,每次取完指针下移，下一次取下一行的该列
 *  2.fetchAll()获取全部数据
 *  3.fetchColumn()获取一个字段数据(一列)，不能拿布尔值，因为取不到值也是返回false。取布尔值要用fetch.每次取完指针下移，下一次取下一行的该列
 * */

//获取一条数据
//$row = $pdo_statement->fetch();
//获取全部数据
//$row = $pdo_statement->fetchAll();
//获取一个字段的值
//每次取完指针下移，下一次取下一行的该列
$row = $pdo_statement->fetchColumn(/*字段的索引(第几列)*/1);//admin
$row1 = $pdo_statement->fetchColumn(/*字段的索引(第几列)*/1);//admin
$row2 = $pdo_statement->fetchColumn(/*字段的索引(第几列)*/1);//zhangsan
//
//
echo '<pre>';
var_dump($row);
var_dump($row1);
var_dump($row2);



//控制返回的数据
//1.只返回关联数据(不返回数组的索引数据，比如1=>'admin')
$nrow = $pdo_statement->fetch(PDO::FETCH_ASSOC);
var_dump($nrow);

//2.与1相反，只返回索引数据
$nrow1 = $pdo_statement->fetch(PDO::FETCH_NUM);
var_dump($nrow1);

//两者都返回
$nrow2 = $pdo_statement->fetch(PDO::FETCH_BOTH);
var_dump($nrow2);


die;


