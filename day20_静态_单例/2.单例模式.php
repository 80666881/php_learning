<?php

/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 上午11:16
 */
class DaoMysql
{
    //定义需要的属性

    //这是一个mysql数据库的连接
    private $mysql_link;

    //$instance 是一个静态属性，表示DaoMysql的一个对象实例
    private static $instance = null;

    //构造方法
    function __construct($host, $user, $pwd)
    {
        $this->mysql_link = @mysqli_connect($host, $user, $pwd);
    }

    //写一个静态方法，通过这个静态方法来创建对象实例
    public static function getSingleton($host, $user, $pwd)
    {
        if (self::$instance == null) {
            return self::$instance = new DaoMysql($host, $user, $pwd);
        } else {
            return self::$instance;
        }
    }

    //阻止克隆
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

$dao1 = new DaoMysql('localhost', 'root', '1001133');
$dao2 = new DaoMysql('localhost', 'root', '1001133');

echo '<pre>';
var_dump($dao1);
var_dump($dao2);
echo '<hr>';
$dao3 = DaoMysql::getSingleton('localhost','root','1001133');
$dao4 = DaoMysql::getSingleton('localhost','root','1001133');
$dao5 = DaoMysql::getSingleton('localhost','root','1001133');
//$dao6 = clone $dao2;
var_dump($dao3);
var_dump($dao4);
var_dump($dao5);
var_dump($dao6);