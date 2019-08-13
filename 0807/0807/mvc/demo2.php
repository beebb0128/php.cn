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

class Facade
{
    // 容器类的实例
    protected static $container = null;

    // 模型数据
    protected static $data = [];

    // 初始化方法
    public static function initialize(Container $container)
    {
        static::$container = $container; // static:: 后期静态绑定

    }

    // 为二个基本的访问创建统一的静态访问接口
    // 获取模型数据的静态接口
    public static function getData()
    {
        static::$data = static::$container->make('model')->getData();
    }

    // 渲染模板的静态接口
    public static function fetch()
    {
        return static::$container->make('view')->fetch(static::$data);
    }
}

// 声明一个商品类
class Product extends Facade
{
    // ....
}


// 创建客户端的控制器
class Controller
{
    public function __construct(Container $container)
    {
        Product::initialize($container);
    }


    public function index()
    {
        Product::getData();  // 获取数据

        return Product::fetch();  // 渲染模板
    }

}

$controller = new Controller($container);

echo $controller->index();



