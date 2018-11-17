<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 10:39 PM
 */

/*
 * 预处理好处
 *  优化查询过程，提高查询速度
 *  安全性高，避免sql注入
 *
 * */

//添加用户案例


//1.得到一个php=>mysql的连接
$mysqli = new mysqli('localhost:3306','root','1001133','learning_mysql');

//2.设置字符集
$mysqli->set_charset('utf8');

//3.编写添加用户,?表示占位符
$sql = "INSERT INTO `account` VALUES(?,?,?)";

//4.代表一个prepare语句
$pre_sql = $mysqli->prepare($sql);

//5.绑定参数给预处理
$id = 42;
$name = '华为';
$money = 2310;
/*
 * 给预处理语句的?绑定参数
 * @param isd:表示i=>int，s=>string，d=>double
 * @param $id,$name,$money 传入值
 * */
$pre_sql->bind_param('isd',$id,$name,$money);
if($pre_sql->execute()){
    echo '执行成功';
}else{
    echo '执行失败__'.$mysqli->error;
}


//6.多次插入新值，不需要再写insert语句
$id = 40;
$name = '魅族';
$money = 2300.2;
/*
 * 给预处理语句的?绑定参数
 * @param isd:表示i=>int，s=>string，d=>double
 * @param $id,$name,$money 传入值
 * */
$pre_sql->bind_param('isd',$id,$name,$money);
if($pre_sql->execute()){
    echo '执行成功';
}else{
    echo '执行失败__'.$mysqli->error;
}


$pre_sql->close();
$mysqli->close();