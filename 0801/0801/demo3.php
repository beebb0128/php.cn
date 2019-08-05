<?php

namespace __0801;

// 属性重载
// __get($name), __set($name, $value), __isset($name), __unset($name)

class Demo3
{
    private $name;
    private $salary;
    protected $secret = '其实猪哥和朱老师不是同一个人';

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    // 属性重载方法: __get()
    public function __get($name)
    {
        if ($name === 'secret') {
            return ($this->name === 'admin') ?  $this->$name : '无权查看';
        }
        return $this->$name;
    }

    // 属性重载方法: __set()
    public function __set($name, $value)
    {
        if ($name === 'salary') {
            return ($this->name === 'admin') ?  $this->$name = $value : '无权修改';
        }
        return $this->$name = $value;
    }

    public function __isset($name)
    {
        if ($this->name === 'admin') {
            if (isset($this->salary)) {
                echo '存在该属性';
            } else {
                echo '没有这个属性';
            }
        } else {
            echo '无权检测';
        }

    }

    public function __unset($name)
    {
        if ($this->name === 'admin') {
           unset($this->$name);
        } else {
            echo '无权删除';
        }

    }
}

$obj = new Demo3('朱老师', 6666);
$obj = new Demo3('admin', 6666);
//$obj = new Demo3('欧阳克', 8888);

//echo $obj->name, '<br>';
//echo $obj->secret, '<br>';

$obj->salary = 4444;

echo $obj->salary, '<br>';

// 检测某一个属性是否存在
//isset($obj->salary);

//unset($obj->salary);


isset($obj->salary);

