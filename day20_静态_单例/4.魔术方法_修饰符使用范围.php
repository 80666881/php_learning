<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午4:30
 */
/*
 * public 实例直接可以调用
 * protected 实例不能调用  继承可以调用
 * private 实例，继承都不能调用,只能类内部调用
 *
 * */

class Clerk
{
    public $name;
    protected $job;
    private $salary;

    function __construct($name, $job, $salary)
    {
        $this->name = $name;
        $this->job = $job;
        $this->salary = $salary;
    }

    public function getName()
    {
        echo '<br>name=' . $this->name . '<br>';
    }

    protected function getJob()
    {
        echo '<br>job=' . $this->job . '<br>';
    }

    private function getSalary()
    {
        echo '<br>name=' . $this->salary . '<br>';
    }
}

$salary1 = new Clerk('tom', 'cooker', 20000);
$salary1->getName();

//$salary1->getJob();//Call to protected method Clerk::getJob() from context


//protected可以用继承使用
class NewClerk extends Clerk
{
    public function getJob()
    {
        echo '<br>job=' . $this->job . '<br>';

    }
//    public function getSalary(){
//        echo '<br>name=' . $this->salary . '<br>';
//    }
}

$salary2 = new NewClerk('tom', 'cooker', 20000);
$salary2->getJob();
//$salary2->getSalary();//Undefined property: NewClerk::$salary in ...


//使用_get和_set来操作protected和private属性
class Person
{
    public $name;
    protected $nickName;
    private $address;

    function __construct($name, $nickName, $address)
    {
        $this->name = $name;
        $this->nickName = $nickName;
        $this->address = $address;
    }

    //魔术方法,get和set都会调用这个方法，跟js的defineProperty一样
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if(property_exists($this,$name)){
            $this->name = $value;
            echo '<br>'.$name.'='.$value;
        }else{
            echo '<br>属性不存在...';
        }
    }

    //魔术方法__get实现对protected和private的访问
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (property_exists($this, $name)) {
            echo '<br>' . $name . '=' . $this->name;
        }
    }
}

$p1 = new Person('小明','葫芦娃','葫芦山');
$p1->nickName = '大葫芦娃';
$p1->address = '葫芦岛';

$p1->address;


/*
 * 魔术方法优缺点：
 *  优点：
 *      简单，一对__set和__get就可以搞定所有的private,protected属性
 *  缺点:
 *      不够灵活，不能对单个属性进行验证和操作。
 *  解决办法：
 *      对每个private，protected属性提供一对get/set方法，这样就可以分开对每个属性进行验证和操作
 * */


class Book{
    public $bookName,$author;
    protected $price;
    private $sales;

    function __construct($bookName,$author,$price,$sales=0)
    {
        $this->bookName = $bookName;
        $this->author = $author;
        $this->price = $price;
        $this->sales = $sales;
    }

    //给price和sales提供一对get和set方法
    public function setPrice($price){
        //这里可以对price进行验证和处理
        if(is_numeric($price) && $price > 0){//is...为判断类型的函数
            $this->price = $price;
            echo '<br>设置价格为'.$this->price.'<br>';
        }else{
            echo '<br>价格格式不正确<br>';
        }
    }
    public function getPrice(){
        echo '<br>当前书本价格为'.$this->price.'<br>';
    }
}

$book1 = new Book('笑傲江湖','金庸',34);
echo '<pre>';
var_dump($book1);
$book1->setPrice(40);
$book1->getPrice();