<?php

namespace __0801;

require 'Query.php';

use _0801\Query;

class Db
{
    // 数据库的连接对象
    protected static $pdo = null;

    // 连接方法
    public static function connection()
    {
        self::$pdo = new \PDO('mysql:host=127.0.0.1;dbname=php', 'root','root');
    }

    public static function __callStatic($name, $arguments)
    {
        // 连接数据库
        self::connection();

        // 实例 化一个查询类Query.php, table(), filed(), select()这些链式方法的提供者
        $query = new Query(self::$pdo);

        // 执行查询类中的方法
        return call_user_func_array([$query, $name], $arguments);
    }


}

//$staffs = Db::table('staff')->select();
$staffs = Db::table('staff')
    ->field('staff_id, name,age,position')
    ->where('staff_id > 2')
    ->limit(5)
    ->select();

foreach ($staffs as $staff) {
    print_r($staff); echo '<br>';
}



