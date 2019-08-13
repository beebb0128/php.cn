<?php

namespace _0805;
use PDO;

// trait:
/*
 * 为什么要用 Trait?
 * 1. php是单继承的语言, 即一个类只允许多一个父类中继承成员
 * 2. trait是一个与"类"类似的数据结构,内部可以声明一些方法或属性,供调用者使用
 *
 * Trait 解析了什么问题?
 * 1. 解决php只能从一个类中继承成员的问题
 * 2. 最大程度的实现了代码复用
 * 3. 对一些无法用类进行封装的功能,使用Trait封装更加的方便,实用
 */

// trait的创建语句与class类是完全一样的
// trait 使用 trait 关键字来声明, 同样, 也不允许实例化,只能是调用类调用

trait Db
{
    // 连接数据库
    public function connect($dsn, $username, $password)
    {
        return new PDO($dsn, $username, $password);
    }
}

trait Query
{
    // 查询满足条件的第一个记录
    public function get($pdo, $where)
    {
        $where = empty($where) ? '' : ' WHERE ' . $where;
        $stmt = $pdo->prepare('SELECT * FROM `staff` ' . $where . ' LIMIT 1');
        $stmt->execute();
//        die($stmt->debugDumpParams());
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // select, insert, update, delete
}

// 客户端
class Client
{
    // 在宿主类中调用上面声明的二个方法集trait
    use Db;
    use Query;

//    use Db, Query;

    public $pdo = null;

    public function __construct($dsn, $username, $password)
    {
        // 调用Trait类Db中的conect()
        $this->pdo = $this->connect($dsn, $username, $password);
    }

    public function find($where)
    {
        return $this->get($this->pdo, $where);
    }
}

$dsn = 'mysql:host=127.0.0.1;dbname=php';
$username = 'root';
$password = 'root';

$client = new Client($dsn, $username, $password);

echo '<pre>'. print_r($client->find('age < 40'), true);