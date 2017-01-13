<?php
/**
 * Created by PhpStorm.
 * User: chiny
 * Date: 2017-01-12
 * Time: 18:10
 */

class Trening_NewModule_Model_Observer{
    public function logCustomer($observer){
        $customer = $observer->getCustomer();
        Mage::log($customer->getName() . " has logged " , null , "customerr.log");
    }

}