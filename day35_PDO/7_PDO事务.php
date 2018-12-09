<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 13:03
 */

/*什么是事务？
    一组DML语句的集合，事务有4个特点，原子性，一致性，隔离性，持久性
    事务就是逻辑上的一组操作，这组操作的各个单元要么全部成功，要么全部失败
    使用事务的存储引擎必须是INNODB类型的
*/


/*使用步骤
    1.开启事务：
        如果各个单元全部成功则全部提交commit
        如果任何一个单元失败则rollback
 */
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);
//例子：
//1.创建表
//create table cash(id int primary key auto_increment,name varchar(32),money decimal(10,2))engine innodb default charset utf8;

//宋江转3000给李逵

//先开启事务
$pdo->beginTransaction();
$sql = "UPDATE cash SET money=money-3000 WHERE name='宋江'";
//增删改是exec(),查询是query()
$res1 = $pdo->exec($sql);

//李逵账号加3000
$sql = "UPDATE cash SET money=money+3000 WHERE name='李逵'";
$res2 = $pdo->exec($sql);

echo '<pre>';
if($res1 && $res2){
    $pdo->commit();
    echo '转账成功';
}else{
    $pdo->rollBack();
    $err = $pdo->errorInfo();
    echo '转账失败<br>';
    var_dump($err);
}