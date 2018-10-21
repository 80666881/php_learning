<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/20
 * Time: 下午9:43
 */

class Clerk{
    public $name;
    protected $salary;
    private $lover;

    //构造函数
    function __construct($name,$salary,$lover)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->lover = $lover;
    }

    //访问protected属性
    public function getSalary(){
        return $this->salary;
    }

    public function getLover(){
        return $this->lover;
    }
}

//创建一个新职员
$clerk1 = new Clerk('tom',20000,'angel');

//访问各个属性
//1.public可以直接访问
echo $clerk1->name;//tom
echo '<br>';
//2.protected不能直接访问，可以通过内部暴露获取的方法
//echo $clerk1->salary;//Cannot access protected property Clerk
echo $clerk1->getSalary();//20000
echo '<br>';

//3.私有属性
//也可以用同样方法返回
echo $clerk1->getLover();
