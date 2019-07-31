<?php
/**
 * Created by Administrator.
 * Date: 31/7/2019
 * Time: 20:52
 */

//example 1 -> 默認參數
function example1( $a , $b = 5 ) {
    $c = $a + $b;
    echo $c.'<hr>';
}
example1(5);

//example 2
function example2() {
    //用func_num_args()查看存入多少個參數
    echo 'User input ' . func_num_args() . ' parameter' . '<hr>';
    echo '<pre>';
    // func_get_args()用數組返回存入的參數
    print_r(func_get_args());
    echo 'Sum: ' . array_sum(func_get_args());
}

example2(1 , 2 , 3 , 4 , 5 , 9);

echo '<hr>';
//example 3 -> 剩餘參數
function example3( $a , ...$b ) {
    //$a = 5
    //$b = $arr =>[6,7,8]
    return $a + array_sum($b);
}
$arr = [ 6 , 7 , 8 ];
echo 'return:'.example3(5 , ...$arr);
echo '<hr>';

//example 4 調用外部元素  use(value)調用外部的值 // &->傳址->可修改值
$email = 'test@gmail.com';
$ex4 = function () use (&$email){
    echo 'original value: '.$email.'<hr>';
    $email = 'new@gmail.com';
    echo 'new value: '.$email.'<hr>';
    return $email;
};
echo 'returned by ex4: '.$ex4().'<hr>';
echo 'echo $email: '.$email;

echo '<hr>';

//example5 用剩餘參數+回調
$arr1 = [ 9 , 10 , 11 ];
function example6( $a , ...$b ) {

    return $a + array_sum($b);
}

echo call_user_func_array('example6', $arr1);

