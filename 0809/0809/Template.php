<?php


namespace bye;

/*
 * 模型引擎:
 * 1. 存储一组变量
 * 2. 读取模板文件: 扩展名任意, 但内容都是php+html
 * 3. 将变量与模板文件组装输出一个动态页面
 */

class Template
{
    // 变量容器:关联数组
    private $data = [];

    // 模板文件
    private $file;

    // 构造方法: 获取到模板文件名称
    public function __construct($file)
    {
        $this->file = $file;
    }

    // 模板赋值
    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    // 生成模板输出
    public function display()
    {
        // 提取模板变量:
        extract($this->data);

        // 开启缓冲区, 只生成数据并不输出到页面中
        ob_start();

        // 加载模板文件
        include  $this->file;

        // 返回缓冲区内容
        $string = ob_get_contents();

        // 并关闭缓冲
        ob_end_clean();

        // 返回模板文件
        return $string;
    }
}