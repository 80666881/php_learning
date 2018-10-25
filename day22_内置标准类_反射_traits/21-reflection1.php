<?php
	header('content-type:text/html;charset=utf-8');
	//16.1	当我们echo $对象时，输出该对象的属性，成员方法等等信息 

	class Cat{
		
		public $name;
		protected $food;
		private $lover;

		public function __construct($name, $food, $lover){
			$this->name = $name;
			$this->food = $food;
			$this->lover = $lover;
		}

		public function showInfo(){
			echo '<br> shoinfo';
		}

		public function __toString(){
			echo '<br> __toString';
			//返回该类的相关信息，比如类名，所有成员方法和所有属性等
			//初步接触一下反射机制(可以获取到该类的所有信息) ReflectionClass

			echo '<br> ';
			//1. 创建一个反射对象, 也就是一个类本身也可以看做一个对象
			$reflection_obj = new ReflectionClass($this);
			echo '<pre>';
			var_dump($reflection_obj);
			//2. 通过反射对象获取该类的相关信息  [你是一个面向对象的程序员]
			
			//(1) 类名
			echo '<br> 类名是 ' . $reflection_obj->getName();
			//(2) 所有成员方法

			echo '<br> 成员方法' ;
			var_dump($reflection_obj->getMethods());

			//(3) 所有属性
			echo '<br> 成员方法' ;
			var_dump($reflection_obj->getProperties());
			return '';
		}
	}


	$cat = new Cat('小猫', '鱼儿', '大猫');

	echo $cat;