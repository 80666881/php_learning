<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午9:50
 */
//抽象类产生原因:父类方法的不确定
/*
 * 细节说明：
 *  1.抽象类不能被实例化
 *  2.抽象类可以没有abstract方法
 *  3.抽象类可以有非抽象方法，成员属性和常量
 *  4.一旦类包含了abstract方法，这个类必须声明为抽象类
 *  5.抽象类不能有函数体
 *  6.如果一个类继承了某个抽象类，则它必须实现该抽象类的所有抽象方法，除非它自己也声明为抽象类
 *
 *
 * */

abstract class Animal {
    public $name;
    //当一个方法，没有确定怎么写,就用抽象方法
    //注意：抽象方法不要有函数体{}
    abstract public function cry();
}

//抽象类存在的价值是让其他的类来继承它
//并实现它的抽象方法,偏重设计  2 让人

class Cat extends Animal{
    function cry(){
        echo '喵喵喵';
    }
}