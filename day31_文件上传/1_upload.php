<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/27
 * Time: 23:47
 */

//服务器如果接受的是文件的话,后端用$_FILES接受
//前端发送时，用type='file',enctype='mutipart/form-data'
echo '<pre>';
var_dump($_FILES);