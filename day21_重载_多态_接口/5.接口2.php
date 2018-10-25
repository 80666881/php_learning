<?php 
	
	//定义设备的工作状态，1开始，2工作，3停止
    /*
     * 接口细节
     *  1.接口不能被实例化
     *      $iusb = new iUsb();//不允许
     *  2.接口的所有方法，都不能实现，即不能有方法体，跟抽象方法一样；
     *  3.一个类可以实现多个接口，需要把接口的所有方法都实现
     *  4.一个接口可以有属性，但是是常量（const NAME = 'test')
     *  5.接口的方法，都是public
     *  6.一个接口可以去继承其他的接口，可以多继承，中间用逗号隔开
     *
     *
     * */
	interface iUsb{
		public function start();
		public function working();
		public function stop();
	}


	//让相机和手机设备实现接口

	class Phone implements iUsb{
		public function start(){
			echo '<br>手机开始工作</br>';
		}
		public function working(){
			echo '<br>手机正在工作</br>';
		}
		public function stop(){
			echo '<br>手机停止工作</br>';
		}
	}

	class Camera implements iUsb{
		public function start(){
			echo '<br>相机开始工作</br>';
		}
		public function working(){
			echo '<br>相机正在工作</br>';
		}
		public function stop(){
			echo '<br>相机停止工作</br>';
		}
	}


	class Computer {

		//接口体现多态
		public function work(iUsb $iusb){//传入一个接口类型的变量,绑定到计算机上
			$iusb->start();
			$iusb->working();
			$iusb->stop();
		}
	}
		$computer = new Computer();
		$phone = new Phone();
		$camera = new Camera();

		var_dump($phone instanceof iUsb);

		$computer->work($phone);

		//手机开始工作
		//手机正在工作
		//手机停止工作
		$computer->work($camera);

		//相机开始工作
		//相机正在工作
		//相机停止工作

        /*  ■ 实现接口 vs 继承类
            php的继承是单继承,也就是一个类最多只能有一个父类,
            这种单继承的机制可保证类的纯洁性,比c++中的多继承机制简洁。
            但是不可否认,对子类功能的扩展有一定影响.所以我们认为:
                (1)实现接口可以看作是对 继承的一种补充，还有一点,继承是层级式的,不太灵活。
                图示，这种结构修改某个类就会打破这种继承的平衡，
                而接口就没有这样的麻烦,因为它只针对实现接口的类才起作用。
				(2)实现接口可在不打破继承关系的前提下,对某个类功能扩展，非常灵活
         *
         * */
 ?>