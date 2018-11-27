<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/27
 * Time: 23:08
 */

//创建一级目录
$dir_full_path = './dir_test';

if(!is_dir($dir_full_path)){
    if(mkdir($dir_full_path)){
        echo '<br>创建目录成功';
    }else{
        echo '<br>创建目录失败';
    }
}else{
    echo  '<br>该目录已经存在';
}

//创建多级目录
/*
 * 默认情况只能创建一级目录
 * 如果希望一次性创建多级目录，则需要使用下面的创建方式
 * */
$dir_full_path2 = './aaa/bbb/ccc';
//
if(!is_dir($dir_full_path2)){
    if(mkdir($dir_full_path2,0777,true)){//true表示recursive,循环创建，0777表示可rwx可读写执行
        echo '<br>创建目录成功';
    }else{
        echo '<br>创建目录失败';
    }
}else{
    echo  '<br>该目录已经存在';
}


//删除目录
//只删除最里面的ccc目录
if(is_dir($dir_full_path2)){
    if(rmdir($dir_full_path2)){
        echo '<br>删除目录成功';
    }else{
        echo '<br>删除目录失败';
    }
}else{
    echo '<br>目录不存在';
}
