<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 9:41 PM
 */

/*
 * 多条sql语句，每次都分别调用数据库语句，效率很低。所以需要批量查询
 *
 * 基本语法
 *  $sqls = "$sql1;$sql2;$sql3..."//最后一个sql语句不要有分号
 *  $mysql->multi_query($sqls)
 * */


//1.得到一个php=>mysql的连接
$mysqli = new mysqli('localhost:3306','root','1001133','learning_mysql');

//2.设置字符集
$mysqli->set_charset('utf8');

//3.编写sql

$sqls = "INSERT INTO `account` VALUES(320,'宋江',345);";
$sqls .= "INSERT INTO `account` VALUES(420,'吴用',400);";
$sqls .= "INSERT INTO `account` VALUES(620,'卢俊义',652);";
$sqls .= "UPDATE `account` SET money=123 where id=300";


/*dml注意
 *  （1）dml[insert,update,delete]和dql[select]不要混合用
 *  （2）批量执行语句的结果是以第一条语句的结果为准
 *  （3）当某条dml错误了，该语句后面的语句就不执行，但之前的sql语句还是执行成功的
 *
 */
if($mysqli->multi_query($sqls)){
    echo '<br>执行成功，正式提交';

}else{
    echo '<br>添加失败，错误原因'.$mysqli->error;
}


