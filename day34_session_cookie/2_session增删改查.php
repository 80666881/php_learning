<?php 

	session_start();
	//1.写入session数据（除资源类型外任意格式）

	$_SESSION['name'] = array('zhangsan',34);
	//session文件得到php序列后的数据
	//name|a:2:{i:0;s:8:"zhangsan";i:1;i:34;}


	//2.读取session
	echo ('<pre>');
	var_dump($_SESSION['name']);


	//3.修改session
	//存在的会修改，不存在会创建
	$_SESSION['name'] = array('lisi',20);
	$_SESSION['hobby'] = array('zhangsan','running');
	$_SESSION['sex'] = array('wangwu','male');

	echo ('<pre>');
	var_dump($_SESSION['name']);
	var_dump($_SESSION['hobby']);


	//4.删除
	//4.1删除单个session
	unset($_SESSION['name']);
    var_dump($_SESSION['name']);

    //4.2删除全部session
    //可能有其他地方创建session，所以不要直接删除$_SESSION

    foreach ($_SESSION as $key => $value) {
    	unset($_SESSION[$key]);
    }

    //4.3删除session文件
    session_destroy();


 ?>