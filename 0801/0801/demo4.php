<?php

// 方法重载: __call(), __callStatic()

namespace __0801;

function sum($a, $b)
{
    return "{$a} + {$b} = " . ($a + $b);
}

// call_user_func_array()
//die(__NAMESPACE__);
echo call_user_func_array(__NAMESPACE__. '\sum', [40, 50]);

echo '<hr>';
class Test1
{
    public function sum($a, $b)
    {
        return "{$a} + {$b} = " . ($a + $b);
    }
}

//$obj = new Test1();

//echo call_user_func_array([$obj, 'sum'], [20,40]);
echo call_user_func_array([new Test1(), 'sum'], [12,56]);

echo '<hr>';
class Test2
{
    public static function sum($a, $b)
    {
        return "{$a} + {$b} = " . ($a + $b);
    }
}

echo Test2::sum(40,80);

echo '<hr>';

echo call_user_func_array([__NAMESPACE__.'\Test2', 'sum'], [150, 260]);
echo '<hr>';
echo call_user_func_array(__NAMESPACE__.'\Test2::sum', [50, 26]);
echo '<hr>';
// 完整的类名 = 命名空间 + 类名,   类名::class
//echo Test2::class;
echo call_user_func_array([Test2::class, 'sum'], [48, 123]);
echo '<hr>';

echo '<h3>方法重载 </h3>';

class Demo4
{
    // 重载普通方法
    // $name: 要重载的方法名称, $arguments: 传给当前方法的参数组成的数组
    public function __call($name, $arguments)
    {
        return '方法名:'.$name.'<br>参数列表: '. '<pre>'.print_r($arguments, true);
    }

    public static function __callStatic($name, $arguments)
    {
        return '方法名:'.$name.'<br>参数列表: '. '<pre>'.print_r($arguments, true);
    }
}

$obj = new Demo4();

// 访问一个不存在的方法
echo $obj->getInfo1(10,20,30);

// 访问一个不存在 的静态方法
echo Demo4::getInfo2('html', 'css', 'javascript');

