<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 9:42 PM
 */

//1.修改文件内容-->写入新内容，前面已经讲过
//2.修改文件名

$file_full_path = './world.txt';

$file_new_full_path = './中文名称测试.txt';
//如果出现中文乱码，是因为文件函数是早期的函数，对中文以gbk形式读取，对gbk，gb2313支持比utf8好，所以需要把中文名称转为gbk
//$file_new_full_path = iconv('utf-8','gbk',$file_new_full_path);
echo($file_new_full_path);
if(file_exists($file_full_path)){
    if(rename($file_full_path,$file_new_full_path)){
        echo '<br>修改名称ok';
    }else{
        echo '<br>修改失败';
    }
}else{
    echo '<br>文件不存在，无法修改';
}