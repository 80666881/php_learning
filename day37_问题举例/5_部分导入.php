<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 17:48
 */

namespace php_file5;
require_once '4.php';
//部分导入


use const php_file4\root;
echo root;


//导入命名空间,整体导入，需要用as取别名再使用
//echo '<br>';
//use const \php_file3\root;//不能重复导入，可以用完全限定

//echo \php_file3\root;