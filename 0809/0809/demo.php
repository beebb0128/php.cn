<?php

//extract(): 将关联数据转为独立的变量名值对

$user = [
    'id'=>120,
    'name'=>'朱老师',
    'sex'=>'男',
    'position'=> '讲师'
];

//$id=120;
//$name='朱老师';
//...

extract($user);

echo $id, '<br>';
echo $name, '<br>';
echo $sex, '<br>';
echo $position, '<br>';



