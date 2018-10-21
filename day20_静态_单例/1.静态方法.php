<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 上午10:56
 */
/*
 * 1.静态方法是在类中定义的
 * 2.静态方法专门用于操作静态属性(重点！！)
 * 3.静态方法可以通过类名调用
 * 4.调用形式，类名::静态方法名(本类名用self::)
 * 5.静态方法不能访问非静态属性
 * */


class staticDemo
{
    public $name;
    private static $total_apple = 200;

    //构造函数
    function __construct($name)
    {
        $this->name = $name;
    }

    //静态方法来操作静态属性
    static function getApple()
    {
        //静态方法不能访问非静态属性
        // echo $this->name;//$this不在一个上下文环境
        echo '<br>苹果一共有' . self::$total_apple . '个';
    }

    //通过内部成员函数调用
    public function test(){
        //方式1（推荐使用这种）
        self::getApple();
        //方式2
        staticDemo::getApple();
        //方式3
        $this->getApple();
    }
}

//调用也是类名直接用::调用静态函数
staticDemo::getApple();
//也可以通过实例对象调用(::或者->)，但不推荐
$test1 = new staticDemo('ddd');
$test1->getApple();
$test1::getApple();
//可以封装在成员函数中
$test1->test();