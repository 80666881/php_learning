<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/2
 * Time: 23:29
 */

/*
使用场景
	购物车:
		goods_list.php 点击商品进行购买（存储到session文件中）
		show_carts.php  查询购买的商品（从session读取）
	防跳墙操作:
		check.php 登录验证操作（登录成功在session做记录）
		index.php 后台首页（查询session的记录是否为登录成功）
	验证码
		Captcha.class.php 生成的验证码（存到session）
		Check.php 将输入验证码与session中的验证码对比

*/
//session_start()先在服务器创建一个session文件的名字，然后再把该名字响应给客户端
session_start();

//此时浏览器cookie就会保存一个phpsession
//在本地tmp文件夹能找到对应session