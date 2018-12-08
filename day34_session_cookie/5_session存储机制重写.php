<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 20:02
 */

//修改配置文件，将session存储机制修改为user(自定义)
ini_set('session.save_handler','user');

//开始自定义自己的session存储机制

//参数1：表示session_start()的时候，怎么处理
//参数2：表示脚本结束的时候怎么处理
//参数3：读取session数据表中的数据的函数
//参数4：向session数据表写入数据的函数
//参数5：销毁session数据表中数据的函数
//参数6：session过期之后的处理函数
session_set_save_handler('open','close','read','write','destroy','gc');//gc:garbage collection

session_start();
//session start执行的函数
function open(){
    //初始化数据库的连接
    $link = mysqli_connect('mysql','root','root',3306);
    mysqli_select_db("php_7");
    mysqli_query('set names utf8');

}

//脚本结束的函数
function close(){
    echo '脚本结束了';
    return true;//固定格式
}

//读取session数据表数据的函数
//说明：客户端携带过来的session_id，会自动传递到read里面
function read($sess_id){
    $sql = "SELECT sess_content FROM session WHERE sess_id='$sess_id'";
    $result = mysqli_query($sql);
    $res = mysqli_fetch_assoc($result);
    return $res['sess_content'];
}

//向session数据表写入数据
//说明：当用户$_SESSION['name'] = 'lisi';这样操作时，就会把这个数据写入到session表
function write($sess_id,$sess_content){
    $sql = "INSERT INTO session VALUES ('$sess_id','$sess_content',".time().")";
    return mysqli_query($sql);
}

//当执行session_destroy删除文件，现在要删除数据表中的记录
//说明：此时也会自动传递浏览器携带的sess_id
function destroy($sess_id){
    $sql = "DELETE FROM session where sess_id = '$sess_id'";
    return mysqli_query($sql);
}

//当session_start时要判断哪些session文件已经过期,在这里会判断哪些数据过期
//说明：会自动把session数据的有效期传递进来
function gc($max_lifetime){
    //$max_lifetime最大有效期
    $time = time()-$max_lifetime;
    $sql = "DELETE FROM session WHERE last_time < $time";
    return mysqli_query($sql);
}

$_SESSION['name'] = 'zhangsan';
echo '写入成功';

//session_destroy();
//echo '删除成功';