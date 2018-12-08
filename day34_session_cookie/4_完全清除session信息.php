<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 17:18
 */

session_start();
//清空内存中的所有session数据
$_SESSION = array();

//删除session文件
session_destroy();

//删除cookie文件中保存的session文件名称
//session_name就是session的名字，PHPSESSIONID，通过它找到f3vda1d12hcih6gptj1oujn6b7
setcookie(session_name(),'',time()-1);