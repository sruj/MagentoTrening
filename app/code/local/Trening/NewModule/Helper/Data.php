<?php

// musi być zachowany naming convention bym w template mógł wywołać metody przez
// $helper = Mage::helper('newmodule');
// $helper->shortDigitsAfterDecimalPoint
class Trening_NewModule_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function shortDigitsAfterDecimalPoint($number,$d=2)
    {
        if(!$number){return "unknown";}
        return number_format($number,$d);
    }

}