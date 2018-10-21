<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午8:07
 */

//常量定义方式有define和const

define('value1',array(1,4,9));
var_dump(value1);

echo '<br>';

const value2 = [1,2,3];
var_dump(value2);

//常量一旦定义，不能销毁