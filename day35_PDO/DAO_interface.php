<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 17:28
 */

interface DAO_interface{

    //查询一条记录的方法
    public function fetchOne($sql);

    //查询所有记录的方法
    public function fetchAll($sql);

    //查询一个字段的值
    public function fetchColumn($sql);

    //执行增删改的操作
    public function exec($sql);

    //引号转义包裹
    public function quote($str);

    //查询刚刚插入的这条数据的主键值
    public function lastInsertId();
}