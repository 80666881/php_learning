<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:39
 */

/*
 * 所谓对象序列化是指: 将一个对象转换成一个字符串，这个字符串包括 属性名，属性值，属性类型， 和该对象对应的类名。
 * 简单的说明就把一个对象的数据和数据类型转成字符串.
 *
 *
 * */

	//对象序列化

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
	$cat = new Cat('机器猫', 100, '电');
	//将$cat 保存到文件中, 在保存对象前，需要向将$cat 序列化
	file_put_contents('/Users/zhengzehao/Desktop/前端(Front-end)/学习/php_learning/day22_内置标准类_反射_traits/cat.log', serialize($cat));

	//O:3:"Cat":3:{s:4:"name";s:9:"机器猫";s:6:"}
	//看到序列化的字串中含有数据和类型

	echo '<br> 保存成功!';