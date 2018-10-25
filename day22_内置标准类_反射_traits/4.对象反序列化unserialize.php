<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:52
 */

	header('content-type:text/html;charset=utf-8');
	//对象的反序列化

	class Cat{

        public $name ;
        protected $age;
        private $food;

        public function __construct($name, $age, $food){
            $this->name = $name;
            $this->age = $age;
            $this->food = $food;
        }
    }

	//1. 将序列化的字符串读入
	$cat_obj_str = file_get_contents('/Users/zhengzehao/Desktop/前端(Front-end)/学习/php_learning/day22_内置标准类_反射_traits/cat.log');
	//2. 进行反序列化操作
	$cat_obj = unserialize($cat_obj_str);

	echo '<pre>';
	var_dump($cat_obj);
	//如果我们希望正确的操作反序列化对象，则需要引入该对象的类定义
	echo '<br> name = ' . $cat_obj->name;

