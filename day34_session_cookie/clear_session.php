<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/8
 * Time: 10:38
 */
session_start();
foreach ($_SESSION as $key => $value) {
    unset($_SESSION[$key]);
    echo '清除session成功';
}