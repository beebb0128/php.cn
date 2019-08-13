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
    protected $model;
    protected $view;

    // 注入点是一个构造方法
    public function __construct(Model $model, View $view)
    {
        $this->model = $model;
        $this->view = $view;
    }


    public function index()
    {
        // 1获取数据
        $data = $this->model->getData();

        // 2渲染模板
        return $this->view->fetch($data);
    }
}


// 客户端调用
$model = new Model();
$view = new View();
$controller = new Controller($model, $view);
echo $controller->index();





