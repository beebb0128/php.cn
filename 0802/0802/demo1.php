<?php
namespace _0802;

// 自动加载
/*
require __DIR__ . '/inc/Test1.php';
require __DIR__ . '/inc/Test2.php';
require __DIR__ . '/inc/Test3.php';


echo \inc\Test1::get(), '<br>';
echo \inc\Test2::get(), '<br>';
echo \inc\Test3::get(), '<br>';

echo '<hr>';

// ::class   获取一个类的完整名称
// 一个类的完整名称 =  命名空间 + 类名
echo \inc\Test1::class, '<br>';
echo \inc\Test2::class, '<br>';
echo \inc\Test3::class, '<br>';

echo '<hr>';

// 以 inc\Test3 为例
// 将类文件中的命名空间解析出来, 做为类文件的引入路径进行加载

//echo \inc\Test4::class;

$path = str_replace('\\', '/', \inc\Test4::class);
$path =  __DIR__ . '/' . $path . '.php';

require $path;  // inc\Test4 这个类加载进来了

echo \inc\Test4::get(), '<br>';
*/

require 'Loader.php';
Loader::autoLoader();


echo \inc\Test1::get(), '<br>';
echo \inc\Test2::get(), '<br>';
echo \inc\Test3::get(), '<br>';
echo \inc\Test4::get(), '<br>';
echo \inc\iam666::call(), '<br>';