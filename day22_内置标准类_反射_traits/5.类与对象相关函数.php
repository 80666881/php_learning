<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:57
 */

	header('content-type:text/html;charset=utf-8');
	//类与对象的相关函数

	class A{
    }

	class Cat extends A{

        public $name = '小花猫';

        public function sayHello(){

            echo '<br> 小花猫说hello';
        }
    }

	//判断某个类是否存在
	if(class_exists('Cat')){
        $cat = new Cat();

        //调用方法
        if(method_exists($cat, 'sayHello')){
            $cat->sayHello();
        }else{
            echo '<br> 没有该方法，无法调用';
        }

        //调用属性
        if(property_exists($cat, 'name')){
            echo '<br> ' . $cat->name;
        }else{
            echo '<br> 没有这个属性，无法调用';
        }

        echo '<br> 类名' . get_class($cat);
        echo '<br> $cat的父类 ' . get_parent_class($cat);
    }else{
        echo '<br> 类不存在无法创建';
    }