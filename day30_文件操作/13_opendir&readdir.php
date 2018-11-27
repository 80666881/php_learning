<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/27
 * Time: 23:22
 */

$dir_full_path = './13dir/';

if(is_dir($dir_full_path)) {
    $dir_handle = opendir($dir_full_path);

    //遍历目录
    while ($file_name = readdir($dir_handle)) {//返回文件名
        //！！！要带上完整路径，否则无法准确判断是文件还是文件夹

        if(is_dir($dir_full_path . $file_name)){
            echo "<br>$file_name".'是目录';
        }else{
            echo "<br>$file_name";
        }
    }
    closedir($dir_handle);
}

