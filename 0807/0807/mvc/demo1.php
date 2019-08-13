<?php

// 容器也是一个类,至少要提供二个功能: 创建类实例, 取出类实例

// 加载模型
require 'Model.php';

// 加载视图
require 'View.php';

// 创建容器类
class Container
{
    // 类实例数组,对象池
    protected $instance = [];

    // 将某个类的实例绑定到容器中
    public function bind($alias, Closure $process)
    {
        // 将类实例保存到容器中
        $this->instance[$alias] =$process;
    }

    // 从容器中取出对象
    public function make($alias, $params=[])
    {
        return call_user_func_array($this->instance[$alias], $params);
    }
}

// 将模型与视图的实例绑定到容器中
$container = new Container();

$container->bind('model', function () {return new Model();});
$container->bind('view', function () {return new View();});


// 创建客户端的控制器
class Controller
{
    public function index(Container $container)
    {
        $data = $container->make('model')->getData();

        return $container->make('view')->fetch($data);
    }

}

$controller = new Controller();

echo $controller->index($container);

