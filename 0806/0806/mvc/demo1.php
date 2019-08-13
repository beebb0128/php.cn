<?php

// 控制器1

// 已经有Mode, View

// 加载模型类
require 'Model.php';

// 加载视图类
require 'View.php';

// 控制器类
class Controller
{
    public function index()
    {
        // 1获取数据
        $model = new Model();
        $data = $model->getData();

        // 2渲染模板
        $view = new View();
        return $view->fetch($data);
    }
}


// 客户端调用

$controller = new Controller();
echo $controller->index();



