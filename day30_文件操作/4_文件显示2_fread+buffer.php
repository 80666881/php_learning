<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 8:19 PM
 */

/*
 * 读文件操作
 * fread,file_get_contents,feof,str_replace,parse_ini_file
 */


$file_full_path = 'file.txt';

if(file_exists($file_full_path)) {

    //1.打开文件
    $fp = fopen($file_full_path, 'r');

    //2.设置缓冲

    $buffer = '';
    $buffer_size = 1024;
    $con_str = '';

    //开始一次读取$buffer_size个字节，循环读取

    while(!feof($fp)){//feof :end of file
        $buffer = fread($fp,$buffer_size);
        //程序员可以根据需要，再对buffer处理
        $con_str.=$buffer;
    }
    //！！关闭文件
    fclose($fp);

   $con_str = str_replace("\n",'<br>',$con_str);
   $con_str = str_replace("\r\n",'<br>',$con_str);
   $con_str = str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$con_str);

    echo $con_str;
}
