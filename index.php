<?php

//use Sandbox\Currency;
//use Sandbox\Money;

//require_once 'src/Currency.php';
//require_once 'src/Money.php';

require_once 'autoload.php';

//$b = new Money(1.5, new Currency('USD'));
//$c = new Money(1.5, new Currency('UAH'));
//echo $b->equals($c);

//$b = new Money(200.5, new Currency('USD'));
//$c = new Money(1.5, new Currency('USD'));
//var_dump($b->add($c));

$b = new \Sandbox\Money(200.5, new \Sandbox\Currency('USD'));
$c = new \Sandbox\Money(1.5, new \Sandbox\Currency('USD'));
var_dump($b->add($c));