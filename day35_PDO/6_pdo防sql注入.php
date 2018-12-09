<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 11:37
 */

$username = $_POST['user'];
$password = $_POST['password'];

//假设查询的用户名为  1' or 1=1 or'
//$sql = "SELECT * FROM user WHERE name='1' or 1=1 or '' AND password='$password'";
//此时1=1肯定成立
//$sql = "SELECT * FROM user WHERE name='$username' AND password='$password'";
//$mysqli = mysqli_connect('mysql', 'root', 'root', 'php_7', 3306);
//$mysqli->set_charset('utf8');
//$result = $mysqli->query($sql);
//$row = $result->fetch_assoc();


//解决办法：
//用PDO将用户提交的数据中的引号转义并包裹
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);
$username = $pdo->quote($username);
$password = $pdo->quote($password);
echo ("$username<br>");
$sql = "SELECT * FROM user WHERE name=$username AND password=$password";//包裹后$username和$password不需要加''
//$sql = "SELECT * FROM user WHERE name='1\' or 1=1 or\'' AND password='$password'";
//此时中间的''都被加了\转义
$state = $pdo->query($sql);
$row = $state->fetch();


if ($row) {
    echo '登录成功';
    echo '<br>';
    echo "<a href='login.html'>返回登录页</a>";

} else {
    echo '登录失败';
    echo '<br>';
    echo "<a href='login.html'>返回登录页</a>";
}