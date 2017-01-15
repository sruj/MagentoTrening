<?php
/**
 * testuję nowy moduł bez użycia kontrolera
 * (tak sobie wymysluł w tutorialu)
 */
require_once 'app/Mage.php';
Mage::app();




/**
 * 1. ładuję produkt o primaryKey entity_id =450 z tabeli catalog_product_entity
 *    i mam dostęp do wszystkich atrybutów tego produktu
 *    np var_dump drukuje 'name' to odbieram to getName()
*/
$p = Mage::getModel("catalog/product")->load(450);
echo $p->getName();
var_dump($p);

/**
 * 2. To samo co wyżej ale innym sposobem
 *    filtruję zapytanie entity_id =450 z tabeli catalog_product_entity
 *    Nie musze filtrować po  primaryKey  entity_id
 *    Mogę po każdej kolumnie, ale wtedy mam kolekcję entities i  muszę w pętli.
 */
$products_collection = Mage::getModel('catalog/product')
    ->getCollection()
    ->addAttributeToSelect('*')
    ->addFieldToFilter('entity_id','450');
//    ->addFieldToFilter('price','5.00');
foreach($products_collection as $product)
{
    var_dump($product);
    echo $product->getName();
}