<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/16
 * Time: 11:51
 */


//基础模型类，各个模型类中的公共代码
class Model
{
    protected $dao;
    public function __construct()
    {
        require_once 'DAOPDO.class.php';
        $option = array(
            'host'=>'mysql',
            'user'=>'root',
            'pass'=>'root',
            'dbname'=>'mysql',
            'port'=>3306,
            'charset'=>'utf8'
        );

        $this->dao = DAOPDO::getSingleton($option);
    }
}