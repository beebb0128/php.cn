<?php


namespace _0801;


class Query
{
    // 连接对象
    public $pdo = null;

    // 数据表
    public $table;

    // 字段列表
    public $field = '*';

    // 查询条件
    public $where;

    // 显示数量
    public $limit;

    // 构造方法, 连接数据库
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // 设置表名
    public function table($tableName)
    {
        $this->table = $tableName;
        // 关键步骤: 返回一个当前类的实例
        return $this;
    }

    // 设置字段
    public function field($fields = '*')
    {
        $this->field = empty($fields) ? '*' : $fields;
        return $this;
    }

    // 设置查询条件
    public function where($where = '')
    {
        $this->where = empty($where) ? $where : ' WHERE ' . $where;
        return $this;
    }

    // 设置数量
    public function limit($limit)
    {
        $this->limit = empty($limit) ? $limit : ' LIMIT ' . $limit;
        return $this;
    }


    // 拼装SQL语句
    public function select()
    {
        // 拼装
        $sql = 'SELECT '
            . $this->field  // 字段
            . ' FROM '
            . $this->table    // 数据表
            . $this->where  //条件
            . $this->limit;

        // 预处理查询
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
//        die($stmt->debugDumpParams());
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}