<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 9:38 PM
 */

//删除文件用unlink

$file_full_path = 'hello2.txt';

if(file_exists($file_full_path)){
    if(unlink($file_full_path)){
        echo '<br>删除成功';
    }else{
        echo '<br>删除失败';
    }
}else{
    echo '<br>该文件不存在，无法删除';
}