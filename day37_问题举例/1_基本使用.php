<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 13:27
 */

/*
 * 当项目越来越大，文件越来越多，定义的函数，变量或者常量就不可避免出现命名冲突的现象，如何解决？
 * 就是采用命名空间
 * 例如A文件有$name
 * D文件引入后，自己也有$name这个变量，就混淆了
 * 所以$name前面的区域修饰就是命名空间，比如A_$name
 *
 * 所以我们在定义类，函数，常量时，在前面加命名空间
 *
 * */

require_once '2.php';


//1、类冲突
class Beauty{
    public function __construct()
    {
        echo '1.php';
    }
}
//Cannot declare class Beauty, because the name is already in use in /var/www/apache_public/php_learning/day37_问题举例/2.php on line 8


//2、函数冲突
function myfunc(){
    echo 'myfunc1';
}
//Fatal error: Cannot redeclare myfunc() (previously declared in /var/www/apache_public/php_learning/day37_问题举例/1_基本使用.php:31) in /var/www/apache_public/php_learning/day37_问题举例/2.php on line 16

//3、常量冲突
const root = '1.php';
//Fatal error: Cannot redeclare myfunc() (previously declared in /var/www/apache_public/php_learning/day37_问题举例/1_基本使用.php:31) in /var/www/apache_public/php_learning/day37_问题举例/2.php on line 16