<?php
// 视图类: 渲染数据

//require 'Model.php';
// 1获取数据
//$model = new Model();
//$data = $model->getData();



class View
{
    public function fetch($data)
    {
        $table = '<table border="1" cellspacing="0" cellpadding="3" width="400">';
        $table .= '<caption>商品信息表</caption>';
        $table .= '<tr bgcolor="#add8e6"><th>ID</th><th>品名</th><th>型号</th><th>价格</th></tr>';

        // 遍历模型数据
        foreach ($data as $product) {
            $table .= '<tr>';
            $table .= '<td>' . $product['id'] . '</td>';
            $table .= '<td>' . $product['name'] . '</td>';
            $table .= '<td>' . $product['model'] . '</td>';
            $table .= '<td>' . $product['price'] . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';

        return $table;
    }
}

// 2渲染模板
//$view = new View();
//echo $view->fetch($data);

