<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午8:14
 */

//魔术常量就是预定义常量


/*常用魔术常量
    __LINE__:文件中的当前行号
    __FILE__:文件的完整路径和文件名
    __DIR__:文件所在目录
    __FUNCTION__:函数名称
    __CLASS__:类名
    __TRAIT__:trait的名字
    __METHOD__:类的方法名
    __NAMESPACE__:当前命名空间的名称

*/

echo __LINE__;
echo '<hr>';
echo __FILE__;
echo '<hr>';
echo __DIR__;//只是目录名，没包括文件名
echo '<hr>';
function abc(){
    echo __FUNCTION__;
}
abc();

echo '<hr>';
class test{
    function getClass(){
        echo __CLASS__;
    }
}
$t = new test();
$t->getClass();//调用类中函数或者变量，需要用->
echo '<hr>';

//rand()函数，产生随机整数,某写平台默认max只有32767，可定义范围
echo (rand());
echo '<hr>';
echo (rand(1,299));



