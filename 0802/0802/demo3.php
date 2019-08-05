<?php

namespace _0802;

// 接口
// 1. 接口不能实例化
// 2. 接口中只允许出现抽象方法
// 3. 接口中的成员全部是公共的:public
// 4. 接口中允许有常量
// 5. 实现接口的类,必须将接口的抽象方法全部实现了

// 创建了一个机动车的接口
interface iVehicle
{
    // 燃料
    public function setFuel($fuel);
    // 用途
    public function setPurpose($purpose);
}

// 小汽车
class Car implements iVehicle
{
    private $fuel;
    protected $purpose;

    // 燃料
    public function setFuel($fuel){
        $this->fuel = $fuel;
    }
    // 用途
    public function setPurpose($purpose){
        $this->purpose = $purpose;
    }

    // 在自定义类中, 可以扩展一个方法
    public function getInfo()
    {
        return $this->fuel . $this->purpose . '车 <br>';
    }
}

// 私家车
class Auto implements iVehicle
{
    private $fuel;
    protected $purpose;

    // 燃料
    public function setFuel($fuel){
        $this->fuel = $fuel;
    }
    // 用途
    public function setPurpose($purpose){
        $this->purpose = $purpose;
    }

    // 在自定义类中, 可以扩展一个方法
    public function getInfo()
    {
        return $this->fuel . $this->purpose . '车 <br>';
    }
}

// Car实例化
$car = new Car();
$car->setFuel('新能源');
$car->setPurpose('公交');
echo $car->getInfo(), '<hr>';

// Auto实例化
$car = new Auto();
$car->setFuel('燃油');
$car->setPurpose('家用');
echo $car->getInfo(), '<hr>';

