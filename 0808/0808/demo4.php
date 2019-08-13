<?php
// 框架中的模型, 通常会与一张数据表对应, 而模型对象,则与数据表中的一条记录对应
// 这种数据表到类的映射关系, 对于面向对象的方式管理数据库极其重要


// 这么神奇的效果, 底层是如何实现的呢? 其实原理简单到不可思议

namespace _0808;

use PDO;

// 模型对应数据表: Staff
class Staff
{
    // 类中属性与表字段对应
    private $staff_id;
    private $name;
    private $age;
    private $sex;
    private $position;
    private $hiredate;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct()
    {
        // 在这里做一些初始化或数据转换
        $this->sex = $this->sex ? '男' : '女';

        $this->hiredate = date('Y/m/d', $this->hiredate);
    }
}

$pdo = new PDO('mysql:host=127.0.0.1;dbname=php', 'root', 'root');
$stmt = $pdo->prepare('SELECT * FROM `staff`');
// 将数据表与类关联
$stmt->setFetchMode(PDO::FETCH_CLASS, Staff::class);
$stmt->execute();
//var_dump($stmt->fetch());
while ($staff = $stmt->fetch()) {
    // 属性重载
    echo "<li>{$staff->staff_id}: {$staff->name}-- {$staff->sex}--{$staff->hiredate}</li>";
}