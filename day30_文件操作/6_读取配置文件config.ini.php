<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 8:57 PM
 */

//读取ini文件,php里不写死账号密码，通过ini文件读取

//获取配置文件

$file_full_path = 'config.ini';

$arr = parse_ini_file($file_full_path);

echo '<pre>';
var_dump($arr);

echo '<br>user='.$arr['user'];
echo '<br>pwd='.$arr['pwd'];