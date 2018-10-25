<?php
	header('content-type:text/html;charset=utf-8');
	//反射的代理调用

	class Cat{
		
		public $name;
		protected $food;
		private $lover;

		public function __construct($name, $food, $lover){
			
			$this->name = $name;
			$this->food = $food;
			$this->lover = $lover;
		}
	
		public function cry($sound){
			echo '<br> ' . $this->name . ' 食物 ' . $this->food . ' 叫声 ' . $sound;
		}

	}

	//传统使用
	$cat = new Cat('小花猫', '<。)#)))≦', '大猫');
	$cat->cry('喵喵');

	
	
	//使用反射机制实现代理调用
	//1. 创建ReflectionClass对象['CAT']
	$reflect_obj = new ReflectionClass('Cat');
	//2. 创建一个Cat对象实例(不能使用new Cat)
	$cat = $reflect_obj->newInstance('小花猫', '<。)#)))≦', '大猫');

	//3. 得到反射方法cry

	$reflect_method_cry = $reflect_obj->getMethod('cry');
	//var_dump($reflect_method_cry);

	//4. 通过反射方法代理调用cry
	$reflect_method_cry->invoke($cat, '嗷嗷');



