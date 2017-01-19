<?php

class Trening_NewModule_Block_Product extends Mage_Core_Block_Template
{
    public function getProducts()
    {

        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('price')
            ->addAttributeToSelect('url_key') //by użyć $product->getProductUrl(), co daje url do produktu
            ->addAttributeToFilter('type_id',['eq'=>'configurable']); //czyli type_id'=='configurable', filtrowanie bo inaczej wszytsko wydrukuje 3-krotnie, nie wiem dlaczego

        return $products;
    }
}
   