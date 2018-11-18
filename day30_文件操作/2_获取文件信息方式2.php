<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 8:13 PM
 */

//1.获取文件路径
$file_full_path = './file.txt';

//2判断文件是否存在
if(file_exists($file_full_path)){
    date_default_timezone_set('PRC');
    echo '<br>文件信息如下';
    echo '<br>文件大小'.filesize($file_full_path).'字节';
    echo '<br>文件类型'.filetype($file_full_path);
    //Y如果小写的话就是两位数的年份，比如18，大写就是2018
    //H大写就是24小时制
    echo '<br>文件创建时间'.date('Y-m-d H:i:s',filectime($file_full_path));
    echo '<br>文件修改时间'.date('Y-m-d H:i:s',filemtime($file_full_path));;
    echo '<br>文件访问时间'.date('Y-m-d H:i:s',fileatime($file_full_path));;


}