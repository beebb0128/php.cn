<?php

namespace _0805;

// 后期静态绑定: 延迟静态绑定
// 场景:用在静态继承的上下文环境中

class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
//        self::who();
        // 让该方法的调用者(类)在调用的时候(执行的时候)再确定是哪个类?
        static::who();

    }
}

// B 已经处在继承的上下文中
class C extends A
{
    // 重写父类A中的who()
    public static function who()
    {
        echo __CLASS__;
    }
}

C::test(); // test()的调用者就应该是B

echo '<hr>';

class Connect
{
    public static function connect()
    {
//        return self::config();
        return static::config();
    }

    public static function config()
    {
        return new \PDO('mysql:host=127.0.0.1;dbname=php','root', '123456');
    }
}

class Link extends Connect
{
    public static function config()
    {
        return new \PDO('mysql:host=127.0.0.1;dbname=php','root', 'root');
    }
}

$pdo = Link::connect();
var_dump($pdo);