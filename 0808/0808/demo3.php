<?php

// 自定义异常类:　继承自 Exception

namespace _0808\_3;

use Exception;
use Throwable;

// 自定义异常类
class CalException extends Exception
{
    // __construct(), __toString(), 其它方法统统是Final 不允许重写
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }

    // 自定义错误信息的输出样式
    // 将错误编码加粗, 将错误文本描红
    public function errorInfo()
    {

        return <<< ERROR
                <h2>
                    <strong>{$this->getCode()}</strong>
                    <span style='color:red'>{$this->getMessage()}</span>
                </h2>
        ERROR;
    }

}




try {
    // 用户需要执行的代码
    class Calculator

    {
        protected $defaultOperators = ['+', '-', '*', '/', '%'];

        protected $result;

        public function __construct(...$operators)
        {
            // 判断操作符是否在有效范围
            foreach ($operators as $operator) {
                if (in_array($operator, $this->defaultOperators)) {
                    continue;
                } else {
//                    die('操作符错误');
                    throw new CalException('操作符错误', 101);
                }
            }

            // 更新操作默认操作符
            $this->defaultOperators = $operators;
        }

        // 运算方法
        public function operation($type, ...$args)
        {
            // 判断操作符的合法性
            if (in_array($type, $this->defaultOperators)) {
                // 获取操作数数量
                $num = count($args);
                switch ($num) {
                    case 0:
//                        die('参数不能为空');
                        throw new CalException('参数不能为空', 102);
                        break;
                    case ($num < 2):
//                        die('参数不能少于2个');
                        throw new CalException('参数不能少于2个', 103);
                        break;
                    default:
                        // 用参数的第一个值来初始化$this->result, 最终结果也会保存在这个属性中
                        // $this->result 也是第一个操作数
                        $this->result = array_shift($args);
                        if (is_numeric($this->result)) {
                            $this->execute($type, ...$args);
                        } else {
//                            die('第一个参数必须是数值型');
                            throw new CalException('第一个参数必须是数值型', 104);
                        }
                }

            } else {
//                die('操作类型错误');
                throw new CalException('操作类型错误', 105);
            }

            // 将最终的运算结果输出
            return round($this->result, 2);
        }

        // 运算执行器方法
        public function execute($type, ...$args)
        {
            foreach ($args as $arg) {
                if (is_numeric($arg)) {
                    switch ($type) {
                        case '+':  // 加法
                            $this->result += $arg;
                            break;
                        case '-':  // 减法
                            $this->result -= $arg;
                            break;
                        case '*':  // 乘法
                            $this->result *= $arg;
                            break;
                        case '/':  // 除法
                            if ($arg !== 0) {
                                $this->result /= $arg;
                                break;
                            } else {
//                                die('除数不能为零');
                                throw new CalException('除数不能为零', 106);
                            }
                        case '%':  // 取模
                            $this->result %= $arg;
                            break;
                    }
                } else {
//                    die('操作数类型错误');
                    throw new CalException('操作数类型错误', 107);
                }
            }
        }
    }

// 实例化并自定义允许的计算类型
    $calculator = new Calculator('+','-','*', '/');
//$calculator = new Calculator('+','-','ppp');

//echo $calculator->operation('+');  // 参数为空
//echo $calculator->operation('+', 100);  //
//echo $calculator->operation('+', 100, 'eee');  //
    echo $calculator->operation('+', 100, '888');  //
//
    echo '<hr>';

    echo $calculator->operation('-', 100, '888');

    echo '<hr>';

    echo $calculator->operation('*', 100, '888');

    echo '<hr>';
//
    echo $calculator->operation('/', 100, '888');




} catch (CalException $e) {
    // 输出异常信息
//    echo $e->getCode() . ': ' . $e->getMessage();
    echo $e->errorInfo();

}



