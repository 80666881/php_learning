<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/27
 * Time: 23:32
 */

$dirname = './13dir/';

echo getDirSize($dirname);

function getDirSize($dirname){
    $dirsize = 0;
    //$dir是一种流
    $dir = opendir($dirname);
    while ($filename = readdir($dir)){
        echo "<br>$filename";
        $file = $dirname.$filename;
        if($filename!=='.' && $filename!=='..'){
            if(is_dir($file)){
                $dirsize += getDirSize($file);
            }else{
                $dirsize += filesize($file);
            }
        }
    }
    closedir($dirname);
    return $dirsize;
}