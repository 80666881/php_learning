<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/13
 * Time: 9:03 PM
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

$sql = 'SELECT * FROM emp where sal>1000 order by sal';

$res_arr = $dao->fetchAll($sql);

echo '<pre>';

foreach ($res_arr as $item) {
    var_dump($item);
}