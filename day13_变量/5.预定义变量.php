<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午5:03
 */


/*预定义变量：
    就是php系统内置提供给使用的变量，这个变量一般都是超全局变量
    超全局变量可以跨页面


    $GLOBALS
        可以获取当前页面所有变量

    $_SERVER
        自动获取服务器和客户端的信息，包括地址，浏览器信息，端口，协议等等

    $_GET
    $_POST

    $_FILES
        获取上传文件的信息

    $_COOKIE
    $_SESSION
    $_REQUEST
        http的Request变量，默认情况是包含了$_GET,$_POST,$COOKIE的数组
    $_ENV
*/

//@ $GLOBAL
$name = 'admin';
$age = 18;
$sex = 1;
var_dump($GLOBALS['name']);//admin
function adc(){
    echo $GLOBALS['name'];
}
adc();//admin


//@ $_SERVER
//var_dump($_SERVER);
echo '<table border="1">';
foreach ($_SERVER as $k=>$v){
    echo '<tr>';
    echo '<td>'.$k.'</td><td>'.$v.'</td>';
    echo '</tr>';
}
echo '</table>';


//@ $_FILES
if($_FILES) {
    var_dump($_FILES);
    /*
     * array(1) { ["update"]=> array(5) { ["name"]=> string(11) "cropped.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(36) "/Applications/MAMP/tmp/php/phpvJU5vd" ["error"]=> int(0) ["size"]=> int(61496) } }
     * */
//move_uploaded_file将上传的文件移到新位置
//类型可以指定tmp或者图片类型
    move_uploaded_file($_FILES['update']['tmp_name'], '/Users/zhengzehao/Desktop/aaa.jpeg');
}

echo '<br>'.'<br>'.'<br>'.'<br>';

//@ $_GET用get方法获取传过来的内容

if($_GET['name']) {
    $tmpName = $_GET['name'];
    echo($tmpName);
}

//@ $_POST用post方法获取传过来的内容
if($_POST['post_file']) {
    $post_file = $_POST['post_file'];
    var_dump($post_file);
}

echo '<br>'.'<br>'.'<br>'.'<br>';


var_dump($_REQUEST['post_file']);//ggg
var_dump($_REQUEST['name']);
