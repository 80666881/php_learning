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

//组织sql语句
$sqls = "SELECT * FROM `emp`;";
$sqls .= "SELECT * FROM `account`;";


if($mysqli->multi_query($sqls)){
    echo '<br>执行成功，正式提交';
    //把结果取出来
    do{
        //$res就是mysql_result对象
        $res = $mysqli->store_result();
        while ($row = $res->fetch_assoc()){
            foreach ($row as $key=>$val){
                echo '--'.$val;
            }
            echo '<br>';
        }
        //释放结果
        $res->free();

        //判断有没有下一个结果集,该函数只是判断还有没有更多的结果，不会向下移动
        //要向下移动需要用next_result()
        if(!$mysqli->more_results()){
            break;
        }
    }while($mysqli->next_result());
}else{
    echo '<br>添加失败，错误原因'.$mysqli->error;
    exit;
}


