<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/27
 * Time: 23:18
 *
 *
 */

$file_full_path = './file.txt';
$copy_file_full_path = './new_file.txt';

//中文条件下如果找不到文件，说明需要转为gbk读取
//$file_full_path = iconv('utf-8','gbk',$file_full_path);$copy_file_path同理

if(file_exists($file_full_path)){
    if(copy($file_full_path,$copy_file_full_path)){
        echo '<br>拷贝成功';
    }else{
        echo '<br>拷贝失败';
    }
}else{
    echo '<br>文件不存在';
}