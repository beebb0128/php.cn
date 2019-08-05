<?php

namespace _0802;

// 接口实战的小案例
// 定义一个接口, 实现数据库的常用操作: CURD
interface iCurd
{
    // 增加数据
    public function create($data);

    // 读取数据
    public function read();

    // 更新数据
    public function update($data, $where);

    // 删除数据
    public function delete($where);
}

// 创建Db类,实现iCurd接口
class Db implements iCurd
{
    // 数据库的连接对象
    protected $pdo = null;

    // 数据库
    protected $table;

    // 构造方法: 连接数据库,并设置默认的数据表
    public function __construct($dsn, $username, $password, $table)
    {
        $this->pdo = new \PDO($dsn, $username, $password);
        $this->table = $table;
    }

    // 增加数据
    public function create($data)
    {
        // 字段列表
        $fields = ' (name, age, sex, position, mobile, hiredate) ';
        // 值列表
        $values = ' (:name, :age, :sex, :position, :mobile, :hiredate) ';
        // 创建SQL语句
        $sql = 'INSERT INTO '.$this->table . $fields . ' VALUES ' . $values;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

//        die($stmt->debugDumpParams());

        // 返回新增数据, 新增记录的id也返回
        return [
            'count' => $stmt->rowCount(),
            'id' => $this->pdo->lastInsertId()
        ];
    }

    // 读取数据
    public function read($fileds = '*' , $where='', $limit = '0, 5')
    {
        // 设置查询条件
        $where = empty($where) ? '' : ' WHERE ' . $where;
        $limit = ' LIMIT ' . $limit;
        $sql = 'SELECT '. $fileds . ' FROM ' . $this->table. $where . $limit;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        // 用二维数组返回所有数据
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    // 更新数据
    public function update($data, $where)
    {
        // 难点在于SET参数
        $keyArr = array_keys($data);
        $set = '';

        // 遍历这个字段列表, 拼装 set
        foreach ($keyArr as $value) {
            $set .= $value . '= :' . $value. ',';
        }
        //age= :age,position= :position,把最后一个逗号删除
        $set =rtrim($set, ', ');

        $sql = 'UPDATE '. $this->table.' SET '.$set.' WHERE '.$where;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

        // 返回更新的数量
        return $stmt->rowCount();

    }

    // 删除数据
    public function delete($where)
    {
        $sql = 'DELETE FROM '. $this->table. ' WHERE '.$where;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        // 返回删除的数量
        return $stmt->rowCount();
    }
}

// 实例化Db
$dsn = 'mysql:host=127.0.0.1;dbname=php';
$username = 'root';
$password = 'root';
$table = 'staff';
$db = new Db($dsn, $username, $password, $table);

// 新增操作
$data = [
    'name'=> '高明',
    'age'=> 30,
    'sex' => 1,
    'position' => '驸马',
    'mobile'=> '13899988776',
    'hiredate' => time()
];

//$res = $db->create($data);
//echo '成功的新增了 '. $res['count']. '条记录, 新增的记录的ID是: '. $res['id'];

echo '<hr>';

// 查询操作
foreach ($db->read() as $item) {
    print_r($item); echo '<br>';
}

echo '<hr>';

// 查询操作
foreach ($db->read('staff_id, name,position, age', 'age > 50') as $item) {
    print_r($item); echo '<br>';
}

// 更新操作
$data = [
    'age' => 40,
    'position' => '小乞丐'
];

//$where = 'staff_id = 22';

//echo '成功的更新了: ' . $db->update($data, $where) . ' 条记录';

echo '<hr>';

// 删除操作
$where = 'staff_id = 22';

echo '成功的删除了: ' . $db->delete($where) . ' 条记录';

