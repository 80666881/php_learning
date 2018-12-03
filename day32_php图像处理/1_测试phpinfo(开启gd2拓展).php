<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/12/2
 * Time: 21:06
 */

//var_dump(phpinfo());

/*
 * 检查gd开启
 *  看phpinfo()里，gd support是否为enable
 * */

/**
 * 创建图像步骤
 *  1.先在内存中，创建图像资源（理解成画布）
 *  2.给画布分配颜色（默认是真空黑色）
 *  3.给画笔分配颜色
 *  4.开始回执
 *  5.直接在浏览器输出，保存到本地
 *  6.销毁图像资源
 *
 */

//1.创建画布
$image = imagecreate(400,400);
//2.分配颜色
$color = imagecolorallocate($image,23,145,200);

imagefill($image,0,0,$color);

//3.开始绘制图像
//3.1绘制线条
$red = imagecolorallocate($image,200,0,0);
imageline($image,0,0,100,100,$red);

//4.输出还是保存
header("content-Type:image/png");
imagepng($image);

//销毁图像
imagedestroy($image);