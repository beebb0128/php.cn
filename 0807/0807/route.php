<?php

// 1. 从pathinfo切割出独立的单元
// 2. 从pathinfo中解析出模块/控制器/操作
// 3. 从pathinfo中解析出变量键值对



// pathinfo:　
// QueryString: 查询字符串

// 路由的基本功能: 将URL地址pathinfo, 映射到指定的控制器方法中/函数
// 路由就是一个请求分发器

//http://php.io/0807/mvc/demo2.php/admin/index/hello


print_r($_SERVER['REQUEST_URI']); // pathinfo
echo '<hr>';
$uri = $_SERVER['REQUEST_URI'];

$request = explode('/', $uri);

echo '<pre>'. print_r($request, true);

$route = array_slice($request, 3);
//echo '<pre>'. print_r($route, true);

//list():将一个索引数组,给每一个值分配一个变量名
// list()不是函数,是一个语法结构, 函数永远不可能出现在等号左边
list($module, $controller, $action) = $route;
//$moudle = $route[0];
//$controller = $route[1];
//$action = $route[3];

echo '模块: '.$module.', 控制器:' .$controller. ', 操作方法: '.$action.'<br>';

// 将这三个独立变量转为关联数组
// $pathinfo['module'] = $module;
// $pathinfo['controller'] = $controller;
// $pathinfo['action'] = $action;

 $pathinfo = compact('module', 'controller', 'action');
echo '<pre>'. print_r($pathinfo, true);

// 下面我们从Pathinfo将参数的键值对解析出来
///id/10/name/peter

//$arr = ['id'=>10, 'name'=>'peter'];

$values = array_slice($request, 6);

for ($i=0; $i<count($values); $i+=2) {
    if (isset($values[$i+1])) {
        $params[$values[$i]] = $values[$i+1];
    }
}

echo '<pre>'. print_r($params, true);

// 创建一个控制器
class Index
{
    public function hello($id, $name)
    {
        return "Index控制器hello():\$id= {$id}, \$name={$name} ";
    }

    public function demo($a, $b, $c)
    {
        return "Index控制器hello():\$a= {$a}, \$b={$b}, \$c={$c} ";
    }
}


echo call_user_func_array([(new $pathinfo['controller']), $pathinfo['action']], $params);