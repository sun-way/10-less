<?php
header('Content-Type: text/html; charset:utf-8');
error_reporting(-1);
 class Product {
    public $title;
    protected $price;
    public $weight;
    public  $dostavka=250;
    private $discount = 10;
    public function getDiscount(){
        return $this->discount;
    }
    public function getPrice(){
        return $this->price;
    }
    protected function getPriceDiscount(){
        if ($this->getDiscount()) {
            return round($this->price - ($this->price * $this->getDiscount()/100));
        }
        else {
            return $this->price;
        }
    }
    public function getFunGetPriceDiscount(){
        return $this->getPriceDiscount();
    }
    public function __construct($title, $price, $weight){
        $this->title = $title;
        $this->price = $price;
        $this->weight = $weight;
    }
}
class Planshet extends Product{}
class Potato extends Product{
    function getFunGetPriceDiscount(){
        if($this->weight > 10000){
            return parent::getFunGetPriceDiscount();
        }
        else{
            return $this->getPrice();
        }
    }
}
class Jacket extends Product{}
$planshet = new Planshet('Планшет', 2000, 400);
$potato = new Potato('Картошка', 700, 12000);
$jacket = new Jacket('Куртка', 700, 2000);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php

            echo $planshet->title . ' цена без скидки ' . $planshet->getPrice() . ', со скидкой ' . $planshet->getFunGetPriceDiscount();
            echo '<br>';
            echo $potato->title . ' цена без скидки ' . $potato->getPrice() . ', со скидкой ' . $potato->getFunGetPriceDiscount();
            echo '<br>';
            echo $jacket->title. ' цена ' . $jacket->getPrice();
        ?>
    </body>
</html>
