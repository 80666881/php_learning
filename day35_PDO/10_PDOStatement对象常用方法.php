<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 16:57
 */

/*获得PDOStatement对象的方法:
    query()
    prepare()
 * */

/*PDOStatement提供的方法

 *  fetch() 查询一条记录
 *  fetchAll()  查询所有记录
 *  fetchColumn()   查询一个字段的值
 *
 *  bindValue() 绑定参数，替换占位符
 *
 *  execute()   执行预编译的sql语句
 *
 *  closeCursor() 关闭游标指针(查完数据后恢复游标，指针不向下移)
 *
 *  errInfo()   预编译sql语句的错误信息(PDO也提供，属于不同对象调用函数时发生错误，要分开捕捉)
 *  errCode()   预编译sql语句的错误代码(PDO也提供，属于不同对象调用函数时发生错误，要分开捕捉)
 *
 *  rowCount()  获得执行增删改，受影响的行数
 * */


//errInfo
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

//use表不存在
$sql = "SELECT * FROM USE";
$pdo_statement = $pdo->prepare($sql);

//先执行才能获得sql语句的错误信息
$pdo_statement->execute();
$err = $pdo_statement->errorInfo();
echo '<pre>';
var_dump($err);

//rowCount
$sql = "UPDATE user SET password=md5('admin123')";

$pdo_statement = $pdo->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->rowCount();

var_dump($result);//int(4)


