<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 13:36
 */
namespace php_file3;

require_once '4.php';

const root ='33';


//完全限定名称  \php_file4\表示限定在php_file4
echo 'root'.'----'.\php_file4\root.'<br>';

//一旦使用namespace声明，之后所有代码都属于该空间

//类只在当前空间找


//函数，常量会在全局找



