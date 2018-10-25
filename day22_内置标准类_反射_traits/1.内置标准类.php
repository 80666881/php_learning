<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:25
 */

//有时候需要直接创建一个对象，就像js的Object，可以用内置标准类

$obj = new stdClass();
echo '<pre>';

$obj->name = 'test';
var_dump($obj);