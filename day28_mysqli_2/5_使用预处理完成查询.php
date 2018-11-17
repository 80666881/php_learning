<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 10:39 PM
 */


//1.得到一个php=>mysql的连接
$mysqli = new mysqli('localhost:3306','root','1001133','learning_mysql');

//2.设置字符集
$mysqli->set_charset('utf8');

//3.sql语句,有3列
$sql = "SELECT id,name,money FROM `account` where id > ?";

//4.代表一个prepare语句
$pre_sql = $mysqli->prepare($sql);

//5.绑定参数给预处理
$id = 100;


//绑定结果
//因为bind_result是引用传递，因此这个变量名称和下面fetch时保持一致就可以了
$pre_sql->bind_result($myid,$myname,$mymoney);

/*
 * 给预处理语句的?绑定参数
 * @param isd:表示i=>int，s=>string，d=>double
 * @param $id,$name,$money 传入值
 * */
$pre_sql->bind_param('i',$id);
if($pre_sql->execute()){
    echo '执行成功';
    //取出查询结果的方法
    while ($pre_sql->fetch()){
        echo "<br> -- '.$myid.' -- '.$myname.' -- '.$mymoney";
    }
}else{
    echo '执行失败__'.$mysqli->error;
}

//释放结果集
$pre_sql->free_result();
$pre_sql->close();
$mysqli->close();