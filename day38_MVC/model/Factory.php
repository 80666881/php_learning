<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/16
 * Time: 11:58
 */

//工厂类，功能是根据用户传递的模型类，返回单例的模型对象
class Factory
{
    //定义公共的静态方法
    //参数：模型名
    public static function M($modelName){
        //！！！需要将数组定义为静态变量，这样，在脚本周期内会将数组的值保存到内存中
        static $model_list = array();
        if(!isset($model_list[$modelName])){
            $model_list[$modelName] = new $modelName;
        }
        return $model_list[$modelName];
    }
}

class UserModel{

}

$m1 = Factory::M('UserModel');
$m2 = Factory::M('UserModel');
$m3 = Factory::M('UserModel');

echo '<pre>';
var_dump($m1,$m2,$m3);
