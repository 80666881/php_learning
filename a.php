<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/4/28
 * Time: 下午10:54
 */

echo 'hello world';
$time = '22:26';
$use_name = 'zhengzehao';
echo '<br/>';

$now = "now is {$time}";
echo $now,$use_name;

echo '<br/>';

echo($_GET['user_name']);

$value_from_post = $_POST['pass_word'];
echo $value_from_post;
echo "通过post传过来的值是{$value_from_post}";
echo $_POST['pass_word'];
?>
