<?php

namespace _0801;

class Demo2
{
    // 类常量
    const NATION = '中国';

    // 类量与类属性不一样
    public static $sex = '男';

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    // 实例方法
    public function getInfo()
    {
        return $this->name . '的性别是: ' . self::$sex. ', 国籍是: ' . self::NATION;
    }
}

$obj = new Demo2('朱老师');

// 访问类属性: 静态属性
echo Demo2::$sex, '<br>';

// 访问类常量
echo Demo2::NATION, '<br>';

Demo2::$sex = '保密';
echo Demo2::$sex, '<br>';

//Demo2::NATION = '日本';

//echo Demo2::NATION, '<br>';

echo $obj->getInfo();
