//////////10 основное задание
<?php
interface  iVenicle{
    public function is_need();
    public function accelerate($speed );
    public function stop();
    public function getBrand();
    public function getModel();
    public function getYear();
    public function getPower();
    public function getSpeed();
}
class Venicle  implements iVenicle {  //суперкласс для  car
    public static $need_Peoples = 1;
    public $brand;
    public $model;
    public $year;
    public $horsesPower;
    public $speed;
    public function is_need()
    {
        return !self::$need_Peoples;
    }
    public function accelerate($speed )
    {
        $this->speed = $speed;
    }
    public function stop()
    {
        $this->speed = 0;
    }
    public function getBrand()
    {
        return $this->brand;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getPower()
    {
        return $this->horsesPower;
    }
    public function getSpeed()
    {
        return $this->speed;
    }
}
class Car extends Venicle
{

    public static function need_AgainstPeople()
    {
        self::$need_Peoples = false;
    }
    public function __construct($brand, $model, $year, $horsesPower)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->horsesPower = $horsesPower;
    }

}
$Honda = new Car('honda', '336', 1400, 144);
$bmv = new Car('BMV', 'Logan', 129, 80);
$Honda->accelerate(8990);
$bmv->accelerate(130);
echo 'Скорость Honda: ', $Honda->getSpeed(), '<br />';
echo 'Марка  машины нравится людям: ', $Honda->is_need() ? 'да' : 'нет', '<br />';
echo '<br />';
echo 'Скорость Bmv: ', $bmv->getSpeed(), '<br />';
echo 'Марка  машины нравится людям: ', $bmv->is_need() ? 'да' : 'нет', '<br />';
Car::need_AgainstPeople();
echo '<br />';
echo 'Honda восстребована на рынке: ', $Honda->is_need() ? 'да' : 'нет', '<br />';
echo 'Bmv  восстребована на рынке: ', $bmv->is_need() ? 'да' : 'нет', '<br />';
echo '********************************************************<br>';
interface imedi{
    public function pushOnButton();
    public function turnOn();
    public function __construct($brand, $model, $diagonal);
    public function turnOff();
    public function isOn();
}
 abstract class media  implements imedi {//cупер класс TV
    public $brand;
    public $model;
    public $diagonal;
    public $isOn = false;

}
class TV extends media
{

    public function __construct($brand, $model, $diagonal)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->diagonal = $diagonal;
    }
    public function pushOnButton()
    {
        return   $this->isOn = !$this->isOn;
    }

    public function turnOn()
    {
        if (!$this->isOn) {
            $this->pushOnButton();
            return 'Телевизор включился';
        }
        return 'Телевизор уже включён';
    }
    public function turnOff()
    {
        if ($this->isOn) {
            $this->pushOnButton();
            return 'Телевизор выключен';
        }
        return 'Телевизор и так выключен';
    }
    public function isOn()
    {
        return $this->isOn;
    }
}
$tvPhilips = new TV('Philips', 'L324MX', 39);
$tvLG = new TV('LG', 'Multi Max 3000', 130);
$tvPhilips->turnOn();
$tvPhilips->turnOff();
$tvLG->pushOnButton();
echo 'Philips работает? ', $tvPhilips->isOn() ? 'да.нажата  кнопка' : 'нет', '<br><br>';
echo 'LG работает? ', $tvLG->isOn() ? 'да, нажата  кнопка ON' : 'нет', '<br />';
echo 'Philips выклю4ен? ', $tvPhilips->turnOff() ? 'да, отклю4или его' : 'нет', '<br />';
echo '********************************************************<br>';
interface iStationery {
    public function __construct($color);
    public function write($text);
}
 abstract class  Stationery implements  iStationery
{
    public $price;
    public $brand;
    public $model;
}
class Pen extends Stationery
{
    private $color;
    public function __construct($color)
    {
        $this->color = $color;
    }
    public function write($text)
    {
        return "<p style=\"color: $this->color\">" . $text . '</p>';
    }
}
$bluePen = new Pen('blue');
$greenePen = new Pen('green');
$redPen= new Pen('red');
$orange= new Pen ('OrangeRed');
$cherry= new Pen('rgb(148,0,220)');
$sky = new Pen('DeepSkyBlue');
$sun= new Pen('Orange');
echo $sun->write('Каждыи охотник  желает знать  где сидит фазан');
echo $redPen->write('Каждыи охотник  желает знать  где сидит фазан');
echo $bluePen->write('Каждыи охотник  желает знать  где сидит фазан,');
echo $greenePen->write('Каждыи охотник  желает знать  где сидит фазан,');
echo $orange->write('Каждыи охотник  желает знать  где сидит фазан');
echo $cherry->write('Каждыи охотник  желает знать  где сидит фазан');
echo $sky->write('Каждыи охотник  желает знать  где сидит фазан');
echo '********************************************************<br>';
interface iwater {
    public function __construct($breed, $weight, $number);
    public function feed($food);
    public function getWeigth();
   // public function giveBackWeight();
}

  abstract class  waterfowl implements iwater {//cупер класс утки
    public $view;
    public  $height;
    public $price;

}
 class Duck extends  waterfowl
{
    public $breed;
    private $weight;
    public $number;
    public function __construct($breed, $weight, $number)
    {
        $this->breed = $breed;
        $this->weight = $weight;
        $this->number = $number;
    }
    public function feed($food)
    {
        if (!($food instanceof Bread)) {
            return 'Это не еда';
        }
        return $this->weight +=  $food->giveBackWeight();
    }
    public function getWeigth()
    {
        return $this->weight;
    }
}
class Bread
{
    private $weight;
    public function giveBackWeight()
    {
        $weight = $this->weight=50;
        return $weight;
    }
}
$duck1 = new Duck('Blue', 1400, '1');
$duck2 = new Duck('Pink', 1000, '2');
$bread = new Bread();
echo 'Утка 1 весит: ', $duck1->getWeigth(), '<br />';
echo 'Утка 2 весит: ', $duck2->getWeigth(), '<br />';
echo 'Хлебушек весит : ', $bread->giveBackWeight(), '<br />';
echo '<br />';
$duck1->feed($bread);
echo 'Утка '.$duck1->number.'  после кормления весит: ', $duck1->getWeigth(), '<br>';
echo '********************************************************<br>';
interface  iShop{
    public function __construct($name, $category, $price, $discount = 0);
    public function getName();
    public function getCategory();
    public function getPrice();
    public function getDiscount();
    public function getPublicPrice();
}
 abstract class Shop implements  iShop {//  суперкласс  Product
    public $brand;
    public $city;
    public $name;
    public $category;
    public $price;

}
class Product extends Shop
{

    private $discount;
    public function __construct($name, $category, $price, $discount = 0)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->discount = $discount;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($newDiscount)
    {
        return $this->discount = $newDiscount;
    }
    public function getPublicPrice()
    {
        return ($this->price - ($this->price * ($this->discount / 100)));
    }
}
$pizza = new Product('pizza', 'cafe food', 8000,30);
$milk = new Product('milk', 'food', 500, 50);
echo 'Цена пиццы без скидки: ', $pizza->getPrice(), '<br />';
echo 'Цена молока без скидки: ', $milk->getPrice(), '<br />';
echo '<br />';
echo 'новая стоимость пиццы со скидкой: ', $pizza->getPublicPrice(), '<br />';
echo 'новая стоимость молока со скидкой: ', $milk->getPublicPrice(), '<br />';
echo '<br />';
