<?php
/**
 * testuję nowy moduł bez użycia kontrolera
 * (tak sobie wymysluł w tutorialu)
 */
require_once 'app/Mage.php';
Mage::app();
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);



/**
 * 1. ładuję produkt o primaryKey entity_id =450 z tabeli catalog_product_entity
 *    i mam dostęp do wszystkich atrybutów tego produktu
 *    np var_dump drukuje 'name' to odbieram to getName()
*/
$p = Mage::getModel("catalog/product")->load(450);
echo $p->getName(); // to samo: $p->getData('name');
//var_dump($p);

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
//    var_dump($product);
    echo $product->getName();
}


/**
 * 3. Zapisywanie
 * -był error:
 * -TypeError: Argument 3 passed to Mage_Catalog_Model_Resource_Abstract::_canUpdateAttribute() must be of the type array, null given,
 * -ale Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID); rozwiązało
 * - http://stackoverflow.com/a/18758042/6827096
 */
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
$productId = 450;
$newCost = 'Jojne';
$product = Mage::getModel('catalog/product')->load($productId);
$product->setName($newCost)->save();
$p = Mage::getModel("catalog/product")->load(450);
echo $p->getName();

/**
 * 4.1. Kolekcja entities
 * -nie działa bo:
-[!] Kolekcja nie zwraca pełnych obiektów EAV entities,
-[!] tylko statyczne atrybuty, czyli te z podstawowej tabeli
- czyli z tabeli catalog_product_entity
- (pamiętasz, że EAV to wiele tabel)
- (połączonych primarykey)
- statyczne czyli niezmienne
- a jest masa dynamicznych/zależnych atrybutów innych tabel
- i tych atrybutów nie wydrukuję bezpośrednio w pętli kolekcji
- np $products->getName()
- bo tabela podstawowa productów nie ma atrybutu "name"
- name jest w innych tabelach i zależy od ustawienia języka
- np germany, english
 */
$products = Mage::getModel('catalog/product')->getCollection();
foreach($products as $product)
{
    echo $product->getName();
}

/**
 * 4.2. Kolekcja entities - addAttributeToSelect
 * - to nie jest JOIN,
 * - tu podaję atrybuty które chcę potem wyświetlić
 * - z róznych tabel
 * - i Magento to magicznie niczym JOIN łączy, ale ja tu nie podaję primary key jak w JOIxxxxN
 */
$products = Mage::getModel('catalog/product')->getCollection()
    ->addAttributeToSelect('name');

foreach($products as $product)
{
echo $product->getName();
}

/**
 * 4.3. Kolekcja entities - addAttributeToSelect
 * -mogę odebrać wszystkie atrybuty wszystkicj tabl używając "*"
 */
$products = Mage::getModel('catalog/product')->getCollection()
    ->addAttributeToSelect('*');

foreach($products as $product)
{
    echo $product->getName();
}

/**
 * 4.4. Kolekcja entities - addAttributeToSelect
 * -mogę odebrać kilka atrybutów z różnych tabel
 */
$products = Mage::getModel('catalog/product')->getCollection()
    ->addAttributeToSelect('name')
    ->addAttributeToSelect('price');

foreach($products as $product)
{
    echo $product->getName();
}

/**
 * 4.5. Kolekcja entities - addFieldToFilter
 * -filtrowanie
 */
$products = Mage::getModel('catalog/product')->getCollection()
    ->addAttributeToSelect('name')
    ->addAttributeToSelect('price')
//    ->addFieldToFilter('price','5.00');           //price=5.00
    ->addFieldToFilter('price',array("lt"=>50));    //price<50

foreach($products as $product)
{
    echo $product->getName();
}
