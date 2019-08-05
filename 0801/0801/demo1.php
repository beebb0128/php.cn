<?php

namespace _0801;

// 静态属性和静态方法

class Demo1
{
    public $product;

    // 静态属性: static
    public static $price;

    public function __construct($product, $price)
    {
        $this->product = $product;
        // 在类中访问静态的成员
        self::$price = $price;
    }

    // 实例方法
    public function getInfo1()
    {
        return $this->product . ' 价格是:　'. self::$price;
    }

    // 静态方法
    public static function getInfo2()
    {
//        return $this->product . ' 价格是:　'. self::$price;
    }

    // 静态方法1
    public static function getInfo3($product)
    {
        return $product . ' 价格是:　'. self::$price;
    }

}

$obj = new Demo1('衣服', 300);
// 实例属性
echo $obj->product, '<br>';
// 静态属性, 类的外部直接用类名访问, 双冒号: 范围解析符
echo Demo1::$price, '<br>';

echo '<hr>';

echo $obj->getInfo1(), '<br>';

echo '<hr>';

//echo $obj->getInfo2(), '<br>';

$product = $obj->product;

echo $obj->getInfo3($product);