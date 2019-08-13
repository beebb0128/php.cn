<?php

// 控制器2: 依赖注入, 解决了对象之间的高度耦合的问题

// 已经有Mode, View

// 加载模型类
require 'Model.php';

// 加载视图类
require 'View.php';

// 控制器类
class Controller
{
    // 普通方法中实现了依赖注入
    // 注入点是一个普通方法
    public function index(Model $model, View $view)
    {
        // 1获取数据
        $data = $model->getData();

        // 2渲染模板
        return $view->fetch($data);
    }
}


// 客户端调用

$controller = new Controller();

$model = new Model();
$view = new View();

echo $controller->index($model, $view);



