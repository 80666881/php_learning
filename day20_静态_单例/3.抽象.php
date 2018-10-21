<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午1:19
 */

class Account{
    public $accountNo;
    private $pwd;
    private $balance;

    //构造函数
    function __construct($accountNo,$pwd='888888',$balance=0.0)
    {
        $this->accountNo = $accountNo;
        $this->pwd = $pwd;
        $this->balance = $balance;
    }

    //查询
    function getInfo($pwd){
        echo '你的余额是'.$this->balance;
    }

    //存款
    public function saveMoney($pwd,$amount){
        if($pwd == $this->pwd){
            //存钱
            $this->balance += $amount;
            echo '现在余额是'.$this->balance;
        }else{
            echo '密码错误';
        }
    }

    //取款
    public function getMoney($pwd,$amount){
        if($pwd == $this->pwd){
            if($amount > $this->balance){
                echo '余额不足';
            }else{
                $this->balance -= $amount;
                echo '取出'.$amount.'元';
                echo '余额'.$this->balance;
            }
        }else{
            echo '密码错误';
        }

    }


}

$account1 = new Account(123,888888,100);
$account1->saveMoney(888888,10000);
$account1->getInfo(888888);
$account1->getMoney(888888,200);
