<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 11:43
 */

require_once 'smarty/Smarty.class.php';

$smarty = new Smarty();

//真实数据
$name = '江南七侠';

$real_name = '菜鸡';


//将真实数据分配一下，并显示即可生成编译文件
//参数1，模板中html的变量名字（占位符名字）
//参数2，模板中真实的数据
//就会生成一个编译文件，使用真实的数据代替模板中的占位符
$smarty->assign('name',$name);
$smarty->display('templates/1_template.html');