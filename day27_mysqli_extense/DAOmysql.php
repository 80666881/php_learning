<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 3:47 PM
 */

/*
 * 完成对mysql数据库操作
 *
 * 开发类
 *  1.定义类名
 *  2.定义成员属性
 *  3.定义成员方法
 */

final class DAOmysql{
    //将成员属性以_开头，是一种命名风格
    private $_host;
    private $_user;
    private $_pwd;
    private $_dbname;
    private $_port;
    private $_charset;

    //单例模式
    //$_instance表示DAO的一个对象实例
    private static $_instance;

    //mysql连接对象
    private $_mysqli;

    //定义构造方法
    private function __construct(array $option) {
//        echo '<pre>';
//        var_dump($option);

        //验证数据
        $this->_host = isset($option['host'])?$option['host']:'';
        $this->_user = isset($option['user'])?$option['user']:'';
        $this->_pwd = isset($option['pwd'])?$option['pwd']:'';
        $this->_dbname = isset($option['dbname'])?$option['dbname']:'';
        $this->_port = isset($option['port'])?$option['port']:'';
        $this->_charset = isset($option['charset'])?$option['charset']:'';

        if($this->_host == '' || $this->_user == '' || $this->_pwd == ''){
            die('参数传入有误!');
        }

        //初始化mysqli
        $this->_mysqli = new MySQLi($this->_host,$this->_user,$this->_pwd,$this->_dbname);

        if($this->_mysqli->connect_errno){
            die('连接失败，错误信息是：'.$this->_mysqli->connect_error);
        }

        //设置字符集
        $this->_mysqli->set_charset($this->_charset);

        echo '<pre>';
        var_dump($this->_mysqli);
    }

    //定义一个静态方法 getInstance
    public static function getSingleton(array $option){
        if(!self::$_instance instanceof self){
            //创建一个对象
            self::$_instance = new self($option);
        }
        return self::$_instance;
    }

    //防止克隆
    private function __clone() {
        // TODO: Implement __clone() method.
    }

    //编写一个成员方法，完成对数据表的查询
    public function fetchAll($sql){
        $arr = array();
        if($res = $this->_mysqli->query($sql)){
            //问题1，一般情况下，我们希望将结果对象尽快释放
            //问题2，返回res对象，调用者还需要进行对象处理（循环fetch_assoc）,不理想
            // return $res;

            /*
             * 解决思路
             *  1.把res的数据存到一个数组
             *  2.释放res
             *  3.返回数组
             * */


            //好处：多个文件都需要操作数据库时，直接引用这个class就可以
            while($row = $res->fetch_assoc()){
                $arr[] = $row;
            }
            $res->free();
            return $arr;
        }else{
            echo '<br>执行sql语句失败'.$sql;
            echo '<br>原因是'.$this->_mysqli->error;
            exit;
        }

    }

    //编写一个方法，完成对表的dml操作
    public function query($sql){
        if($this->_mysqli->query($sql)){
            return true;
        }else{
            echo '<br>执行sql语句失败'.$sql;
            echo '<br>原因是'.$this->_mysqli->error;
            exit;
        }
    }
}
