<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 5:29 PM
 */

require 'DAOmysql.php';

$option_arr = array(
    'host'=>'localhost:3306',
    'user'=>'root',
    'pwd'=>'1001133',
    'dbname'=>'learning_mysql',
//    'port'=>3306,
    'charset'=>'utf8'
);
$dao = DAOmysql::getSingleton($option_arr);

$sql = 'SELECT * FROM `user3`';
$result = $dao->fetchAll($sql);
echo '<pre>';
var_dump($result);

echo '<hr/>';

//while($row = $result->fetch_assoc()){
//    var_dump($row);
//}

var_dump($result);
echo '<hr/>';

foreach ($result as $item){
    var_dump($item);
}


echo '<hr/>';
$sql = 'INSERT INTO `user3` VALUES(NULL,"sixsix","123","66@sohu.com","2014-1-1")';
$res_add = $dao->query($sql);

if($res_add){
    echo ('添加成功');
}

