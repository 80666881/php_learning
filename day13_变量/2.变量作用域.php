<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午4:21
 */
/*
 * 变量类型
 *     1.全局变量
 *         在函数外部定义的变量，只能在函数外使用
 *     2.局部变量
 *         在函数内部定义的变量，只能在函数内部使用
 *
 *
 * */


//全局变量

$name = 'admin';

function user(){
//     echo $name;//不能在函数内部使用
}


//静态变量
$age = 18;
$age++;
echo $age;//19
echo '<br>';
function age1(){
    $age = 18;
    echo $age;//18
}
age1();//18
echo '<br>';

//想要递增，可以使用静态变量
function age2(){
    static $age = 20;//用static声明为静态
    $age++;
    echo $age.'<br>';
}
age2();//21
age2();//22
age2();//23
echo $age;//19，在外面的还是用全局变量，所以是19

//注意！！不能在外面（全局）声明为静态
static $age = 18;//不起作用，没有意义



echo '<br>';

//@变量的转化

//局部=>全局（局部变量可以在函数内声明为全局变量，这时候局部就可以在函数外使用）
function admin(){
    $name1 = 'admdin';
}
admin();
//echo $name1;// Undefined variable: name1
function admin1(){
    global $name1,$age1;//声明为全局变量，只能在函数内声明
    $name1 = 'addin111';
    $age1 = 22;
}
admin1();
echo $name1.','.$age1;//addin111,22