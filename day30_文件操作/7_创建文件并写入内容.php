<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/11/18
 * Time: 9:03 PM
 */

/*
 * fopen(filename,mode)
 *  mode:
 *      'r':只读方式打开，指针指向文件头，不存在就报错
 *      'r+':读写方式打开，指针指向文件头，可以读写
 *      'w':写入方式打开，指针指向文件头并且删除其他内容，文件不存在就创建
 *      'w+':读写方式打开,指针指向文件头并且删除其他内容，文件不存在就创建
 *      'a':写入方式打开，指针指向文件尾，文件不存在就创建
 *      'a+':读写打开，指针指向文件尾，文件不存在就创建

 * */

$file_full_path = 'hello.txt';

if(!file_exists($file_full_path)){
    //创建
    if($fp = fopen($file_full_path,'w')){
        //创建或者打开成功
        $con = '';
        for($i=0;$i<10;$i++) {
            //双引号才会转义
            $con .= "hello\r\n";
        }
        //echo $con;
        //写入
        fwrite($fp,$con);
        fclose($fp);
    }
}else{
//    在原来的内容上追加
    if($fp = fopen($file_full_path,'a')){
        $con = '';
        for($i=0;$i<10;$i++) {
            //双引号才会转义
            $con .= "added to tail by zzh\r\n";
        }
        fwrite($fp,$con);
        fclose($fp);
    }
}

