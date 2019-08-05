<?php
namespace _0802;

// 抽象类


class Person1
{
    protected $name;

    public function __construct($name='peter zhu')
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }
}

$person = new Person1();
echo '我的姓名是:　' . $person->getName(), '<br>';
$person->setName('朱老师');
echo '我的姓名是:　' . $person->getName(), '<br>';
echo '<hr>';

// 创建出一个抽象类
// 1. 不能实例化, 不能用new
// 2. 类中的抽象方法, 必须在子类全部实现
abstract class Person2
{
    protected $name;

    public function __construct($name='peter zhu')
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    // 这个方法没有实现的过程, 变成了一个抽象方法
    abstract public function setName($value);
}

// 子类来扩展/ 实现一个抽象类
class Sub extends Person2
{
    // 构造方法不会自动继承
    public function __construct($name = 'peter zhu')
    {
        parent::__construct($name);
    }

    // 在子类中将抽象类中的一个抽象方法setName()具体实现一下
    public function setName($value)
    {
        $this->name = $value;
    }
}

$sub = new Sub('猪哥');

echo 'php中文网的创始人是: ' . $sub->getName(), '<br>';

// 调用子类中实现的抽象方法setName()
$sub->setName('朱老师');
echo 'php中文网的讲师: ' . $sub->getName(), '<br>';

