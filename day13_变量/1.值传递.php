<?php
//值传递

$name = '张三';
$zs = $name;
echo $name,$zs;

echo '<br>';

$name = '李四';//变量的重新赋值
echo $name,$zs;
//-----------------------------------

//引用传递
/*
 *  把一个变量的空间地址给另一个变量
    这时候两个变量共用一个数据空间
    指向同一个地址
*/
echo '<br>';
//-----------------------------------


$age = 18;
$zsage = &$age; //&符号叫取址符，用于获得$age变量的地址
echo $zsage;//18

echo '<br>';

//如果改变某个变量，那么引用这个地址的变量都会改变
$age = 20;
echo $zsage;//20
//-----------------------------------

//删除其中一个，相当于删除引用的地址，对于其他引用该地址的变量无影响
unset($age);
echo '<br>';
echo $zsage;
echo $age;//取不到

?>