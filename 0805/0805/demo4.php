<?php

namespace _0805;

// 利用空间别名来简化命名空间的名称

include __DIR__ . '/Test.php';


$className = namespace\one\two\three\Test1::class;
//echo $className::demo();
echo class_exists($className) ? $className .' 类存在' : ' 类不存在';

echo '<hr>';

use \_0805\one\two\three\Test1 as T;
echo class_exists(T::class) ? T::demo() : ' 类不存在';

echo '<hr>';

//use _0805\one\two\three\Test1 as Test1;
use _0805\one\two\three\Test1;
echo class_exists(Test1::class) ? Test1::class .' 类存在' : ' 类不存在';

//use o\p\q\Demo  as Hello;
//use x\y\y\Demo;
//
//Demo::class;