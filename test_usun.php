<?php
/**
 * testuję nowy moduł bez użycia kontrolera
 * (tak sobie wymysluł w tutorialu)
 */
require_once 'app/Mage.php';
Mage::app();





//$product = new Trening_NewModule_Model_Product();
$product = Mage::getModel("NewModule/Product");
$product->sayHello();

$cust = Mage::helper("NewModule/Customer");
$cust->sayHello();

$catal = Mage::getModel("Catalog/Category")->load(2);
var_dump($catal->getChildren());

$cat = Mage::helper("Catalog/Customer");
$cat->sayHello();