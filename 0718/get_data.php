<?php

$userId = isset($_POST['user_id']) ? $_POST['user_id'] : 1;

$users = [
    ['user_id'=>1, 'name'=>'朱老师', 'email'=> 'peter@php.cn'],
    ['user_id'=>2, 'name'=>'猪哥', 'email'=> 'pig@php.cn'],
];

foreach ($users as $user) {
    if ($user['user_id'] === intval($userId)) {
        echo json_encode([
            'status'=>1,
            'message'=>[
                'name'=>$user['name'],
                'email'=> $user['email']
            ]
        ]);
        exit;
    }
}

echo json_encode([
    'status'=>0,
    'message'=>'<span style="color: red">没有找到该用户</span>'
]);

exit;

