<?php
/**
 * Created by PhpStorm.
 * User: zhengzehao
 * Date: 2018/10/28
 * Time: 上午10:35
 */

/* strpos函数时用来查找字符串的子字符的位置的
strpos — Find the position of the first occurrence of a substring in a string

 * int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
 *
 * offset表示从第几个字符开始找，忽略前面的字符，比如abcda,offset为0的话，就是从第0个开始找,找到的pos为0。
 * 如果是offset大于1,就从第一个开始找，pos为4（还是从字符串第一个字符开始数）
 * offset为负，则从后面开始数，比如-1，表示从最后一个字符开始找，还是4
 *
 *
 *
 *
 * */
echo(strpos('abcda','a',5));




$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);
//因为是第0个，如果不用===，那么0会被转为false
if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";
}


// We can search for the character, ignoring anything before the offset
$newstring = 'abcdef abcdefa';
$pos = strpos($newstring, 'a', 0); // $pos = 7, not 0
echo 'pos with pos is '.$pos;
?>