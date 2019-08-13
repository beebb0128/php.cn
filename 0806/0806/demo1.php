<?php

namespace _0806;

/*
 * 单例模式
 * 1. 一个类, 仅允许被实例化一次, 即仅允许某个类创建一个实例
 * 2. 应用场景: 数据库连接, HTTP请求...
 */

class Temp
{

}

$obj1 = new Temp();
$obj2 = new Temp();

var_dump($obj1);
echo '<br>';
var_dump($obj2);
echo '<br>';
// 认为类Temp被实例化二次
var_dump($obj1 === $obj2);

echo '<hr>';

// 单例模式
class Demo1
{
    // 构造方法私有化
    private function __construct()
    {
    }

    private static $instance = null;

    // 生成当前类的唯一实例对象
    public static function getInstance()
    {
        // 如果当前类的实例为NULL,说明还没有被实例化过,是第一次,允许实例化
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        // 返回当前的实例给调用者
        return self::$instance;
    }

    // 禁用外部的clone方式创建新对象
    private function __clone()
    {
        echo '外部的clone方法被调用了.<br>';
    }
}

//$obj1 = new Demo1();

$obj1 = Demo1::getInstance();
var_dump($obj1);
echo '<br>';

// 引用赋值
$obj2 = $obj1;
var_dump($obj2);

echo '<br>';

var_dump($obj1 === $obj2);



