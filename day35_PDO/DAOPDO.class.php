<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 17:33
 */
require_once 'DAO_interface.php';

class DAOPDO implements DAO_interface
{
    //私有的属性，将来实例化的对象保存到该属性上
    private static $instance;//DAOPDO这个类的单例对象
    private $pdo;

    //私有的构造方法
    private function __construct($option)
    {
        $host = isset($option['host']) ? $option['host'] : '';
        $user = isset($option['user']) ? $option['user'] : '';
        $pass = isset($option['pass']) ? $option['pass'] : '';
        $port = isset($option['port']) ? $option['port'] : '';
        $dbname = isset($option['dbname']) ? $option['dbname'] : '';
        $charset = isset($option['charset']) ? $option['charset'] : 'utf8';
        $dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $pass);
        //$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
    }

    //私有克隆方法
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    //提供一个公共的静态方法生成对象
    public static function getSingleton($option)
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self($option);
        }
        return self::$instance;
    }

    public function fetchOne($sql)
    {
        // TODO: Implement fetchOne() method.
        $pdo_statement = $this->pdo->query($sql);
        if ($pdo_statement == false) {
            //说明sql语句有误,输出错误信息
            $err = $this->pdo->errorInfo();
            $err_str = "sql有误，错误信息是： <br>" . $err[2];
            echo $err_str;
            return false;
        }

        //执行到这里，说明sql语句没问题
        return $pdo_statement->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql)
    {
        // TODO: Implement fetchAll() method.
        $pdo_statement = $this->pdo->query($sql);
        if ($pdo_statement == false) {
            //说明sql语句有误,输出错误信息
            $err = $this->pdo->errorInfo();
            $err_str = "sql有误，错误信息是： <br>" . $err[2];
            echo $err_str;
            return false;
        }

        //执行到这里，说明sql语句没问题
        return $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchColumn($sql)
    {
        // TODO: Implement fetchColumn() method.
        $pdo_statement = $this->pdo->query($sql);
        if ($pdo_statement == false) {
            //说明sql语句有误,输出错误信息
            $err = $this->pdo->errorInfo();
            $err_str = "sql有误，错误信息是： <br>" . $err[2];
            echo $err_str;
            return false;
        }

        //执行到这里，说明sql语句没问题
        return $pdo_statement->fetchColumn();
    }

    //执行增删改操作，返回的是返回受影响的记录数
    public function exec($sql)
    {
        // TODO: Implement exec() method.
        return $this->pdo->exec($sql);
    }

    public function quote($str)
    {
        // TODO: Implement quote() method.
        return $this->pdo->quote($str);
    }

    public function lastInsertId()
    {
        // TODO: Implement lastInsertId() method.
        return $this->pdo->lastInsertId();
    }
}

$options = array(
    'host' => 'mysql',
    'port' => 3306,
    'user' => 'root',
    'pass' => 'root',
    'dbname' => 'php_7',
    'charset' => 'utf8'
);
$dao = DAOPDO::getSingleton($options);

$sql = "SELECT * FROM user";
$res= $dao->fetchAll($sql);

//对数据进行转义包裹
$date = "hello '1 or 1' world";
$new_date = $dao->quote($date);
echo '<pre>';
var_dump($new_date);
