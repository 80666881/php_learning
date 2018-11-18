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

//第一种方式

$file_full_path = 'file.txt';

if(file_exists($file_full_path)){

    //1.打开文件
    $fp = fopen($file_full_path,'r');
    //2.获取文件大小
    $file_size = filesize($file_full_path);

    //3.读取内容
    /*
     * fread是读取一个文件的内容
        @param stream $fp 表示文件资源
        @param int $file_size 表示从$fp读取多少个字节
    */
    $con_str = fread($fp,$file_size);

    //！！！！及时关闭文件，重要
    fclose($fp);

    //4.显示在网页
    //echo $con_str;
    //没换行,因为windows换行是\r\n,linux是\n,需要替换为<br>
    //这里的的"\n"不能用单引号''，会被解析成字符串'\n'
    $con_str =  str_replace("\n",'<br>',$con_str);
    $con_str =  str_replace("\r\n",'<br>',$con_str);//兼容性处理

    //替换tab，同样&nbsp需要双引号包裹
    $con_str =  str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$con_str);


    echo $con_str;


}
