<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午8:35
 */
/*
 * php定义的数据类型
 *  标量（基础）: int float string boolean
 *  复合: array object
 *  特殊: null resource
 *
 */


//字符串
//双引号可以用变量，单引号不能用常量

$name = 'admin';
$test1 = '$name';//$name
$test2 = "$name";//admin
$test3 = "{$name}";//admin,加不加{}都可以


echo $test1.'<hr>'.$test2.'<hr>'.$test3.'<hr>';

//转义字符的多少，双引号转义的字符多，单引号只有('\)
//双引号有(\",\n,\r,\t,\v,\e,\f,\$,\[0-7]{1,3},\\等）


//转义：让一些特殊字符失去本身的意义
echo "\"$name\"";//"admin"
echo "\"$name\"\$day";//"admin$day

echo '<hr>';
//单引号转义
echo '\nsss';
echo '<hr>';


//定界符，当前字符串的开始符号，用大写字母，是自定义的，开始定界符后面不能跟任何的字符
//双引号定界符写法
/* $str = <<<定界符
            大量代码（html,css,js,php)
          定界符
*/

$str = <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
                     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                     <title>Document</title>
        </head>
        <body>
          <h3>双引号定界符测试</h3>
          <h4 style="color:red;">测试一段代码</h4>
          <p style="color: blue;">变量{$name}</p>
          <hr>
        </body>
        </html>
HTML;

echo $str;

//单引号定界符不会解析里面的变量
$str1 = <<<'HTML'
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
                     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                     <title>Document</title>
        </head>
        <body>
          <h3>单引号定界符测试</h3>
          <h4 style="color:red;">测试一段代码</h4>
          <p style="color: blue;">变量{$name}</p>
          <hr>
        </body>
        </html>
HTML;

echo $str1;