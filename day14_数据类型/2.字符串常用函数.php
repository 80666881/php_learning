<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午8:59
 */

//字符串分割---explode
$name = 'bob,george,tom';
$arr =explode(',',$name);
var_dump($arr);//array(3) { [0]=> string(3) "bob" [1]=> string(6) "george" [2]=> string(3) "tom" }

echo '<hr/>';

//一维数组组合字符串---implode
$arr1 = ['xxx','yyy','zzz'];
$str1 = implode('-',$arr1);
$new_str1 = join('_',$arr1);
var_dump($str1) ;//"xxx-yyy-zzz"
var_dump($new_str1);////"xxx_yyy_zzz"

echo '<hr/>';


//去除字符串空格，ltrim ,rtrim,trim
//trim只能去除两边的，不能去除中间的空格。
//要在view source里看
$str2 = ' xyz x x ';
echo (ltrim($str2)).'<br>';
echo (rtrim($str2)).'<br>';
echo (trim($str2)).'<br>';
echo '<hr/>';


//替换substr_replace(替换某个序号的值）
$str3 = __DIR__;///Users/zhengzehao/Desktop/前端(Front-end)/学习/php_learning/day14_数据类型
echo $str3.'<br>';
$str4 = substr_replace($str3,'@@@',1,3);
echo $str4.'<br>';///@@@rs/zhengzehao/Desktop/前端(Front-end)/学习/php_learning/day14_数据类型

echo '<hr>';

//替换某个指定的字符str_replace

$str5 = str_replace('/','@',$str3);//@Users@zhengzehao@Desktop@前端(Front-end)@学习@php_learning@day14_数据类型
echo $str5;
echo '<hr>';

//字符串截取 substr,第三个参数是负数的话，就是去掉最后几个
$str6 = substr($str3,1,5);
echo $str6;//user
echo '<hr>';

$str7 = substr($str3,1,-12);//一个中文是3个长度?
echo $str7;//Users/zhengzehao/Desktop/前端(Front-end)/学习/php_learning/day14_

