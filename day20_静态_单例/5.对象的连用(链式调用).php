<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午8:29
 */


class Student{
    public $name;
    private $school;

    function __construct($name,$school)
    {
        $this->name = $name;
        $this->school = $school;
    }
    function getSchool(){
        return $this->school;
    }
    function setSchool($school){
        $this->school = $school;
    }
}

class School{
    public $name;
    public $address;
    private $my_class;
    function __construct($name,$address,$my_class)
    {
        $this->name = $name;
        $this->address = $address;
        $this->my_class = $my_class;
    }
    function getClass(){
        return $this->my_class;
    }
}

class MyClass{
    protected $name;
    protected $stu_num;
    private $introduce;
    function __construct($name,$stu_num,$intro)
    {
        $this->name = $name;
        $this->stu_num = $stu_num;
        $this->introduce = $intro;
    }
    function getIntro(){
        return $this->introduce;
    }

}

//创建班级对象
$c1 = new MyClass('php_class',80,'this is a introduce');
//创建学校对象
$s1 = new School('php_school','beijing',$c1);
//创建学生对象
$stu1 = new Student('tom',$s1);

echo '<pre>';
var_dump($c1);
var_dump($s1);
var_dump($stu1);

var_dump( $stu1->getSchool()->getClass()->getIntro());//这里的school是一个对象
