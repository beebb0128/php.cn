<?php

// 1. 配置上传参数
// 允许上传的文件类型
$fileType = ['jpg', 'jpeg', 'png', 'gif'];
$fileSize = 3145728;
// 文件上传到服务器上的目录
$filePath = '/uploads/';
// 原始文件名称
$fileName = $_FILES['my_file']['name'];
// 临时文件名
$tmpFile = $_FILES['my_file']['tmp_name'];

// 2. 判断是否上传成功?
$uploadError = $_FILES['my_file']['error'];
if ($uploadError > 0) {
    switch ($uploadError) {
        case 1:
        case 2: die('上传文件不允许超过3M');
        case 3: die('上传文件不完整');
        case 4: die('没有文件被上传');
        default: die('未知错误');
    }
}

// 3. 判断扩展名是否正确?
$extension = explode('.', $fileName)[1];
if (!in_array($extension, $fileType)) {
    die('不允许上传' . $extension . '文件类型');
}

// 4. 为了防止同名文件相互覆盖, 应该将上传到目录中 的文件重命名
$fileName = date('YmdHis', time()).md5(mt_rand(1,99)). '.' . $extension;

// 5. 上传文件
// 检测是否是通过 post 上传的
if (is_uploaded_file($tmpFile)) {
    if (move_uploaded_file($tmpFile, __DIR__ . $filePath. $fileName)) {
        echo '<script>alert("上传成功");history.back();</script>';
    } else {
        die('文件无法移动到指定目录, 请检查目录的写权限');
    }
} else {
    die('非法操作');
}


exit();


