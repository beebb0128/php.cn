<?php

namespace bye;

// 加载 模板引擎
require 'Template.php';

// 实例化模板引擎
$template = new Template('hello.tmp.php');

// 模板赋值
$template->set('email', 'peter_zhu@php.cn');

// 输出模板
echo $template->display();

