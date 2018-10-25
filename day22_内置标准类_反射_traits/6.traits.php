<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/21
 * Time: 下午10:56
 */
	header('content-type:text/html;charset=utf-8');
	//traits 技术==>代码复制

	trait my_code{

        function getSum($n1, $n2){
            return $n1 + $n2;
        }

        function getSub($n1, $n2){
            return $n1 - $n2;
        }

        function getMax($n1, $n2, $n3){
            return max($n1, $n2, $n3);
        }
    }

	class A{

        function getSum($n1, $n2){
            echo '<br> A getSum';
            return $n1 + $n2;
        }
    }

	class B extends A{
        //引入my_code trait代码段
        //如果父类有和trait 代码段相同的方法时，那么这时相当与方法重写，
        //B已经包含了getSum方法，但是优先级没有trait高
        use my_code;
    }

	class C extends A{
        use my_code;
    }

	class D extends A{
    }

	class E {
        use my_code;
    }

	$b = new B;
	echo 'sum=' . $b->getSum(10, 20);
//echo 'sub=' . $b->getSub(10, 20);
