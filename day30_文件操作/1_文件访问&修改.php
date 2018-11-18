<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/17
 * Time: 10:51 PM
 */

//1.获取文件路径
$file_full_path = './file.txt';

//2判断文件是否存在
if(file_exists($file_full_path)){
    //3.打开该文件

    /*
     * fopen:函数时打开一个文件，获取到文件指针（资源）
     * @param string $file_full_path 文件路径
     * @param string 'r' 以只读方式打开
     * */

    $fp = fopen($file_full_path,'r');

    echo '<pre>';
    var_dump($fp);//resource(3) of type (stream) 说明文件时一种'流'的形式

    echo '<hr/>';

    //文件状态fstat

    $fileinfo_arr = fstat($fp);

    var_dump($fileinfo_arr);
    /*
     *    ["size"]=>   大小，单位：字节
          int(8328)
          ["atime"]=>  access time：访问时间(时间戳，单位秒）
          int(1542468174)
          ["mtime"]=>   modify time：访问时间(时间戳，单位秒）
          int(1542170222)
          ["ctime"]=>   create time：创建时间(时间戳，单位秒）
          int(1542468172)
     *
     * */

    echo '<hr/>';

    echo '<br>文件信息是:';
    echo "<br>文件大小是".$fileinfo_arr['size'].'字节';
    //设置时区
    date_default_timezone_set('PRC');

    //访问时间是指php文件访问，不是我们自己打开文件
    echo "<br>文件的创建时间是".date('Y-m-d H:i:s',$fileinfo_arr['ctime']);
    echo "<br>文件的访问时间是".date('Y-m-d H:i:s',$fileinfo_arr['atime']);
    echo "<br>文件的修改时间是".date('Y-m-d H:i:s',$fileinfo_arr['mtime']);

    echo '<hr/>';




}else{
    echo '文件不存在';
}