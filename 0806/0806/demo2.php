<?php

namespace _0806;

/**
 * 工厂模式
 * 主要用于批量创建对象,使创建对象的过程剥离出来,标准化
 * 适合于一个类有多个实例, 而这些实例会在不同的地方被创建和引用
 * 使用工厂模式来创建对象, 可以实现, 一处修改, 全局生效
 */

//class Demo888
//{
//
//}

/*
// 该类的一些实例,有可能被多个文件所引用
// file1.php
//$obj = Factory::create('Demo888');

// file2.php
//$obj = new Demo888;

// file3.php
//$obj = new Demo888;
*/

class Test1
{
    public function __construct($arg1)
    {
        echo  '对象创建成功, 参数是: ' . $arg1;
    }
}

class Test2
{
    public function __construct($arg1, $arg2)
    {
        echo  '对象创建成功, 参数是: ' . implode(', ',[$arg1, $arg2]);
    }
}

class Test3
{
    public function __construct($arg1, $arg2, $arg3)
    {
        echo  '对象创建成功, 参数是: ' . implode(', ',[$arg1, $arg2, $arg3]);
    }
}

class Test4
{
    public function __construct()
    {
        echo  '对象创建成功, 无参数~~';
    }
}

// 工厂类:　专用用实例化类
class Factory
{
    /**
     * @param $className: 需要实例化的类名称
     * @param mixed ...$arguments: 实例化传给构造方法的参数
     * @return object 类实例
     */
    public static function create($className, ...$arguments)
    {
        return new $className(...$arguments);
    }
}

Factory::create(Test1::class, 100);

echo '<hr>';

Factory::create(Test2::class, 100, 200);

echo '<hr>';

Factory::create(Test3::class, 100, 200, 300);

echo '<hr>';

Factory::create(Test4::class);




