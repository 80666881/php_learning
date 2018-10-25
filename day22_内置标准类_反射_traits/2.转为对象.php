<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:27
 */

/*  1.数组转对象
 *  2.基本数据类型转对象
 *  3.null转对象
 *  4.将对象转成数组
 *
 * */


//数组=>object
$person = array('name'=>'乔峰','job'=>'丐帮帮主','skill'=>'降龙十八掌','address'=>array('name'=>'大辽','climate'=>'温和'));
$person_obj = (object)$person;//类似java的转化方式,变成标准类的实例对象
echo '<pre>';
var_dump($person_obj);
echo '<br>'.$person_obj->job.'<br>';
echo '<br>'.$person_obj->address['name'].'<br>';

//基本数据类型=>object
$appleNum = 20;
$apple_obj = (object)$appleNum;
echo '<pre>';
var_dump($apple_obj);//object(stdClass)#2 (1) {["scalar"]=>int(20)}
echo $apple_obj->scalar;//20

//对象转成数组
class Cat{
    public $name = '小猫';
    public $age = 44;
    protected $price = 999;
    private $food = 'fish';
}

$cat = new Cat();
$cat_arr = (array)$cat;
echo '<pre>';
var_dump($cat_arr);
    /*
     *
      array(4) {
          ["name"]=>
          string(6) "小猫"
          ["age"]=>
          int(44)
          ["*price"]=>
          int(999)
          ["Catfood"]=>
          string(4) "fish"
        }
     *
     * */
//转化后只能取出public属性
echo $cat_arr['Catfood'];//Undefined index
echo $cat_arr['name'];//小猫