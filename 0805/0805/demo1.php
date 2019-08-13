<?php

namespace _0805;

// 接口常量
if (!interface_exists(__NAMESPACE__ . '\iDbParam')) {
    interface iDbParam
    {
        // 使用接口常量来创建数据库的连接参数
        const TYPE = 'mysql';
        const HOST = '127.0.0.1';
        const USER_NAME = 'root';
        const PASSWORD = 'root';
        const DBNAME = 'php';
        public static function connection ();
    }
}

class Connection implements namespace\iDbParam
{

    // 初始化连接参数
    private static $type = iDbParam::TYPE;
    private static $host = iDbParam::HOST;
    private static $userName = iDbParam::USER_NAME;
    private static $password = iDbParam::PASSWORD;
    private static $dbname = iDbParam::DBNAME;

    // 调用类必须实现接口中的抽象方法
    public static function connection()
    {
        $dsn = self::$type.':host='.self::$host.';dbname='.self::$dbname;
        $user = self::$userName;
        $password = self::$password;
        return new \PDO($dsn, $user, $password);
    }
}

// 实例化Connection,连接数据库
$link = Connection::connection();

$stmt = $link->prepare('SELECT * FROM `staff` LIMIT :limit');
$stmt->bindValue('limit', 5, \PDO::PARAM_INT);
$stmt->execute();
$staffs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

foreach ($staffs as $staff) {
    // date(): 格式化一个时间戳, 以人性的字符串形式输出
    $hiredate = date('Y/m/d', $staff['hiredate']);
    echo "<li>{$staff['staff_id']}--{$staff['name']}--{$staff['position']}--{$hiredate}</li>";
}



