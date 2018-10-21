<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午4:50
 */

/*
 * Isset()
 * 判断变量是否存在，存在是true，否则是为false
 * 可以放入单个变量或多个变量
 *
 * Unset()
 * 删除某个变量或者数组的元素
 *
 * Empty()
 * 判断变量是否为空
 *
 * Echo
 * 输出一个或多个值（整型，字符串），不能输出复合和特殊的数据类型的值
 *
 * Var_dump
 * 打印基本和复合值，也可以检测变量类型
 *
 * */

$ageArray = array(2,3,4);
var_dump($ageArray);//array(3) { [0]=> int(2) [1]=> int(3) [2]=> int(4) }

unset($ageArray['2']);
var_dump($ageArray);// array(2) { [0]=> int(2) [1]=> int(3) }


$test_empty;
$test_empty2 = 'xxx';
var_dump (empty($test_empty));//true
var_dump (empty($test_empty2));//false