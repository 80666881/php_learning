<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 9:33 PM
 */

$file_full_path = 'hello2.txt';

if(!file_exists($file_full_path)){

    //使用file_put_content方法

    $con = '';
    for($i=0;$i<10;$i++) {
        //双引号才会转义
        $con .= "hello world\r\n";
    }

    /*
     * 1.file_put_contents当文件不存在时会先创建再添加
     * 2.如果文件存在就会默认覆盖写，用FILE_APPEND可以追加写
     * */
    file_put_contents($file_full_path,$con);
}else{
    $con = '';
    for($i=0;$i<10;$i++) {
        //双引号才会转义
        $con .= "fullfill with file_put_content\r\n";
    }
    $con.="------------";

    file_put_contents($file_full_path,$con,FILE_APPEND);
}

//推荐使用file_put_content