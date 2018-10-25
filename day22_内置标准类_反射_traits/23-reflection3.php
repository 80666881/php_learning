<?php
	header('content-type:text/html;charset=utf-8');
	//tp 调度

	class IndexAction{
		public function index(){
				echo 'index <br>';
		}
		public function test($year = 2016, $month = 10, $day = 10){
			 echo $year.'--------'.$month.'-----------'.$day.'<br>';
		}
		//前置处理
		public function _before_index(){
				echo	'<br> 前期处理....';
				echo	'<br>' .__FUNCTION__.'<br>';
		}
		//后置处理
		public function _after_index(){
				echo	'<br> 后期的处理';
				echo  __FUNCTION__.'<br>';
		}
	}


	/*
		(1)IndexAction中的方法和访问控制修饰符是不确定的,如果index方法是public,可以执行 _before_index.
		(2)如果存在_before_index 方法，并且是public的，执行该方法
		(3)执行test方法
		(4)再判断有没有_after_index方法，并且是public的，执行该方法

	*/

	if(class_exists('IndexAction')){
		
		//创建一个reflectionClass 对象['IndexAction'类]
		$reflect_object = new ReflectionClass('IndexAction');
		//判断是否有index方法.
		if($reflect_object->hasMethod('index')){

			//创建一个index方法对象
			$reflect_method_index = $reflect_object->getMethod('index');
			if($reflect_method_index->isPublic()){
				
				//判断是否有 _before_index
				if($reflect_object->hasMethod('_before_index')){
					
					$reflect_method_before = $reflect_object->getMethod('_before_index');

					if($reflect_method_before->isPublic()){
						
						$reflect_method_before->invoke($reflect_object->newInstance());
					}

				}

				//调用test方法 
				$reflect_object->getMethod('test')->invoke($reflect_object->newInstance(), 2018, 11, 11);

				//判断是否有 _before_index
				if($reflect_object->hasMethod('_after_index')){
					
					$reflect_method_after = $reflect_object->getMethod('_after_index');

					if($reflect_method_after->isPublic()){
						
						$reflect_method_after->invoke($reflect_object->newInstance());
					}

				}

			}else{
				
				echo '<br> index 不是共有的，无法调用';
			}
			
		}else{
			
			echo '<br> 没有index无法调用..';
		}


	}else{
		echo '<br> 类不存在，无法执行调度';
	}