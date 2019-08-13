<?php

// 模型类: 用于数据库操作,数据访问

class Model
{
    // 用二维数组来模拟一个数据表的结果集的返回
    public function getData()
    {
        return [
            ['id'=>1, 'name'=>'苹果电脑','model'=>'MacBook Pro','price'=>25800],
            ['id'=>2, 'name'=>'华为手机','model'=>'P30 Pro','price'=>4988],
            ['id'=>3, 'name'=>'小爱同学','model'=>'AI音箱','price'=>299],
        ];
    }
}