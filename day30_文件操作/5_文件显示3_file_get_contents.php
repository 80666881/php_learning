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

    //传入路径
    //其实底层使用还是fopen,fread,只是做了封装
    $con_str = file_get_contents($file_full_path);

    //自动关闭，需要手动关闭

    $con_str = str_replace("\n",'<br>',$con_str);
    $con_str = str_replace("\r\n",'<br>',$con_str);
    $con_str = str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$con_str);

    echo $con_str;
}

/*
 * 小结
 *
 *  处理文件很大（100m），建议使用第二种，fopen+buffer
 *  如果普通文件，没有特殊要求，建议使用file_get_content
 *
 *
 * */