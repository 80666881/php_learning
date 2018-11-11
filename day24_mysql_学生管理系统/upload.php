<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/28
 * Time: 上午10:20
 */

//is_numeric — 判断是否是数字或数字字符串
//Finds whether a variable is a number or a numeric string

//不能用is_int()
//只判断是否是整数，不能判断数字字符串。Finds whether the type of the given variable is integer.



$stu_id = isset($_POST['id']) && is_numeric($_POST['id']) && strpos($_POST['id'],'.')===false && ($_POST['id'])?$_POST['id']:'';

$stu_name = isset($_POST['name'])?$_POST['name']:'';

$chinese = isset($_POST['chinese']) && is_numeric($_POST['chinese'])  && ($_POST['chinese'])?$_POST['chinese']:'';

$math = isset($_POST['math']) && is_numeric($_POST['math'])  && ($_POST['math'])?$_POST['math']:'';

$english = isset($_POST['english']) && is_numeric($_POST['english'])  && ($_POST['english'])?$_POST['english']:'';

if( $stu_id == '' || $stu_name=='' || $chinese=='' || $math=='' || $english ==''){
    echo '<br>输入的格式错误';
    exit;
}


$connet = @mysqli_connect('localhost:3306','root','1001133',"learning_mysql");
if(!$connet){
    echo '<br>连接失败';
    exit;
}
echo($stu_id.'---'.$stu_name.'---'.$chinese.'---'.$english.'---'.$math.'<hr>');
var_dump($connet);

mysqli_select_db($connet,'learning_mysql');
$sql = "INSERT INTO `student` VALUES($stu_id,$stu_name,$chinese,$english,$math)";



//注意学生名是字符串，要加''
if(mysqli_query($connet,"INSERT INTO `student` VALUES($stu_id,'$stu_name',$chinese,$english,$math)")){
    require ('./ok.php');
}else{
    echo '信息错误';
}