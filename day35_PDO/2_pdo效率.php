<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 22:09*/

$start = microtime(true);//微秒

//连接100次
for($i=0;$i<100;$i++){
    $dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
    $user = 'root';
    $pass = 'root';
    $pdo = new PDO($dsn,$user,$pass);
}

$end = microtime(true);
$time = $end-$start;


echo 'PDO连接数据库时间'.$time.'<br>';//PDO连接数据库时间0.30925607681274
//使用mysql扩展再连接100次

$m_start = microtime(true);//开始时间


for ($i=0;$i<100;$i++){
    mysqli_connect('mysql','root','root','php_7',3306);
}
$m_end = microtime(true);//结束时间

$m_time = $m_end-$m_start;

echo 'mysqli连接数据库时间'.$m_time.'<br>';//mysqli连接数据库时间0.22461104393005

//所以PDO对效率并没有提升，只是提高了开发效率


