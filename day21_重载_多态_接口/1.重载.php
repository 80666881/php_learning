<?php

/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午9:01
 */

/*
 * php无法像java一样直接使用重载，
 * 可以像js一样，通过判断参数数目进行曲线实现
 *
 * @方法主要用的是__call魔术方法
 * @属性重载用的是__set,__get来实现
 *
 *
 * */
class Person
{
    public $name;

    //写两个函数

    function __construct($name)
    {
        $this->name = $name;
    }

    function getSum($n1, $n2)
    {
        echo $n1 + $n2;
    }

    function getMax($n1, $n2, $n3)
    {
        echo max($n1, $n2, $n3);//max是php提供的数学函数
    }

    //写一个__call魔术方法
    function __call($name, $arguments)
    {

        // TODO: Implement __call() method.
        //$name:函数名
        //先判断是不是调用getVal
        if ($name == 'getVal') {
            if (count($arguments) == 2) {
                return $this->getSum($arguments[0], $arguments[1]);
            } else if ( count($arguments) == 3) {
                return $this->getMax($arguments[0], $arguments[1], $arguments[2]);
            }
        }

    }
}

$p1 = new Person('tom');
$p1->getVal(1, 2, 4);

echo '<hr>';
//属性重载
class Dog{
    private $arr = array();
}
$dog1 = new Dog();
$dog1->age = 90;//会调用__set方法，添加公有属性，即使没有定义也可以添加
echo $dog1->age;

echo '<hr>';

class Cat{
    private $arr = array();
    //这里我们对属性的重载进行控制
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->arr[$name] = $value;
    }
}

$c1 = new Cat();
$c1->age = 20;
echo $c1->age;//因为改写了__set方法，所以这里获取不到$c1->age;

class Pig{
    private $arr = array();
    //这里我们对属性的重载进行控制
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->arr[$name] = $value;
    }

    //可以通过改写__get来获取这个值
    function __get($name)
    {
        // TODO: Implement __get() method.
        if(isset($this->arr[$name])){
            echo $this->arr[$name];
        }else{
            echo '这个属性不存在';
        }
    }
}

$pig1 = new Pig();
$pig1->age = 20;
echo $pig1->age;