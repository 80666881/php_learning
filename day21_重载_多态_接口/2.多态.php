<?php

/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午9:30
 */
class Animal {
    public $name;
    function __construct($name) {
        $this->name = $name;
    }
}

class Cat extends Animal{
    function showInfo(){
        echo '我是'.$this->name;
    }
}

class Dog extends Animal{
    function showInfo(){
        echo '我是'.$this->name;
    }
}

//创建食物类
class Food{
    public $name;
    function __construct($name) {
        $this->name = $name;
    }
}

class Fish extends Food{
    function showInfo(){
        echo $this->name;
    }
}

class Bone extends Food{
    function showInfo(){
        echo $this->name;
    }
}

class Master{
    //在这里用Animal，Food类来约束传入的参数
    //而cat，dog继承了Animal，所以就可以传入，这就是多态
    function feed(Animal $animal,Food $food){
        $animal->showInfo();
        echo '喜欢吃';
        $food->showInfo();
        echo '<hr>';
    }
}

//创建食物和动物
$fish = new Fish('鱼肉');
$bone = new Bone('骨头');
$cat = new Cat('小猫');
$dog = new Dog('小狗');

$m1 = new Master('主人');
$m1->feed($cat,$fish);
$m1->feed($dog,$bone);
//$m1->feed($fish,$bone);Argument 1 passed to Master::feed() must be an instance of Animal, instance of Fish given