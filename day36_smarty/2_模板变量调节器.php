<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/15
 * Time: 12:17
 */

//实际就是类似vue的过滤器，可以将smarty的原始格式进行调整，比如将时间戳转化为日期格式

//格式
//{模板变量|修饰器:传递的参数}

//注意一定要改时区，不然就会是0时区的时间(-8小时)
date_default_timezone_set('PRC');

require_once 'smarty/Smarty.class.php';

$smarty = new Smarty();

$script = '<script>
    for(var a=0;a<20;a++){
        console.log("a="+a);
    }
</script>';
$smarty->assign('name1','hello world');
$smarty->assign('name2','');
$smarty->assign('script',$script);

$smarty->display('templates/2_smarty_modifier.html');