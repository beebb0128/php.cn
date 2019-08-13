<?php

namespace _0805;

// 命名空间的分层管理

echo '当前命名空间是: ' . __NAMESPACE__ . '<br>';

class Dog {}

echo Dog::class . '<hr>';






// 创建一个二级命名空间
namespace _0805\one;
echo '当前命名空间是: ' . __NAMESPACE__ . '<br>';
class Dog {}

echo Dog::class . '<br>';

// 关键字: namespace, 引用当前的命名空间,类似于类中的self

// 在这个二级空间中, 想访问三级空间中的成员, 应该怎么办?
echo namespace\Dog::class . '<br>';
echo \_0805\one\two\Dog::class, '<br>';
echo namespace\two\Dog::class, '<hr>';



// 创建三级命名空间
namespace _0805\one\two;

echo '当前命名空间是: ' . __NAMESPACE__ . '<br>';

class Dog {}

echo Dog::class . '<hr>';
