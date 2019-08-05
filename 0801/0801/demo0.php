<?php

namespace _0801;

// 类成员的访问控制
// 1. public: 默认的, 任何地方可以访问, 类内, 类外, 子类中
// 3. protected: 受保护的, 对外是封闭的不可访问, 但是类的内部和子类可以访问
// 3. private: 私有的, 仅限于本类中的访问

class Demo
{
    public $name; // 姓名
    protected $positon;  // 职位
    private $salary; // 工资
    protected $department; // 部门

    public function __construct($name, $positon, $salary, $department)
    {
        $this->name = $name;
        $this->positon = $positon;
        $this->salary = $salary;
        $this->department = $department;
    }

    // 职位获取器方法
    public function getPosition()
    {
        return $this->department === '培训部' ? $this->positon : '无权查看';
    }

    // 工资获取器方法
    public function getSalary()
    {
        return $this->department === '财务部' ? $this->salary : '无权查看';
    }

    // 工资设置器方法
    public function setSalary($value)
    {
        $this->department === '财务部' ? $this->salary = $value : '无权更新';
    }
}

// 客户端
//$obj = new Demo('朱老师', '讲师', 8888, '培训部');
$obj = new Demo('张老师', '讲师', 7777, '财务部');

echo $obj->name, '<br>';

//echo $obj->position, '<br>';
echo $obj->getPosition(), '<br>';

//echo $obj->salary, '<br>';
echo $obj->getSalary(), '<br>';

echo $obj->setSalary(9999);

echo $obj->getSalary(), '<br>';


class Sub extends Demo
{
    public function salary()
    {
//        return $this->salary;
    }

    public function positon()
    {
        return $this->positon;
    }
}

$obj = new Sub('欧阳克', '讲师', 5555, '财务部');
//echo $obj->salary();

echo $obj->getSalary();

echo $obj->positon();