<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/9
 * Time: 13:45
 */

/*预处理
    先固定sql的结构部分，后期结构不会再变化，只能结果变化
 * */
$dsn = "mysql:host=mysql;dbname=php_7;port=3306;charset=utf8";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dsn,$user,$pass);

//执行删除操作
//结果会导致把所有的数据都删除
$sql = "DELETE FROM user WHERE id=3 || 1=1";
//$pdo->exec($sql);


//分析原因:id的值把整个sql语句分割成2部分
//"DELETE FROM user WHERE id=3"
//"DELETE FROM user WHERE 1=1"


//正常情况下，id为值，不应该和sql语句的结构发生联系
//解决方法
//先固定sql语句的结构，然后再绑定值，这样后期就不会因为id的值而改变sql的结构

/*具体实现
    1.先使用占位符代替id的值
    2.再预处理，也就是固定sql语句的结构
    3.再绑定真实的数据(使用真实的数据替换占位符)
    4.执行sql
*/

//1.用？做占位符
$sql = "DELETE FROM user WHERE id=?";
//2.固定结构,返回pdo的statement对象
$pdo_statement = $pdo->prepare($sql);
//3.使用真实的值来替换占位符,第一个问号(?)用1表示
$pdo_statement->bindValue(1,'id=7 || 1=1');
//4.执行
$pdo_statement->execute();



/*预处理优势
 *  1.对数据库的操作更加安全，一般用户能操作的只是id的值，固定结构后，不会被用户传递的值影响sql语句结构。
 *  2.预处理会将sql语句的结构固定，后期再执行类似操作时，直接使用第一次编译好的结构，不会再重新编译，提高效率
 *
 * */



