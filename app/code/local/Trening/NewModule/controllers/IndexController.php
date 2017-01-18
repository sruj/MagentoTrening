<?php
/**
 * Created by PhpStorm.
 * User: chiny
 * Date: 2017-01-16
 * Time: 03:40
 */

class Trening_NewModule_IndexController extends Mage_Core_Controller_Front_Action{

//    public function sayHello1Action()
//    {
//        /**
//         * dla url localhost/.../trening/index/sayHello1/id/5/foo/bar
//         *
//         * 'id' => '5'
//         * 'foo' => 'bar'
//         * */
////        var_dump($this->getRequest()->getParams());
//
//        $this->loadLayout();
//
//        /**
//         * wydrukuje wszystkie LAYOUT HANDLERS dla żądania strony akcji sayHelloAction
//         * czyli poniżej są nazwy layout handles z róznych mnodułów, z plików /design/../layout/<modul>.xml
//         * w których są bloki kodu które mają być użyte do scalenia i wyświetlenia (bloki instrukcji jak wyświetlić stronę) dla żądania tej akcji
//         * [0] => default                                   // 1. layout handles o nazwie "defaul" - zasięg globalny, każda strona to ma
//         * [1] => STORE_default                             //
//         * [2] => THEME_frontend_rwd_default                // bo używam theme/pakiet rwd/default (czy jakoś tak)
//         * [3] => trening_newmodule_index_sayhello          // tzw: "action layout handle" czyli ścieżka do akcji na podstawie url
//         * [4] => customer_logged_out )                     // 2. layout handles o nazwie "customer_logged_out"  - bo jestem wylogowany
//         * czyli z powyższego system wyszuka layout handles o nazwach customer_logged_out i default i scali z nich jeden kod.
//         */
//        print_r($this->getLayout()->getUpdate()->getHandles());
//
//        /**
//         * wydrukuje jedno wielkie scalone drzewo xml połączonych zewsząd layout handles z powyższej tablicy
//         * z instrukcjami jak zbudować stronę
//         */
//        header('Content-Type: text-xml');
//        die($this->getLayout()->getNode()->asXML());
//
//
//        $this->renderLayout();
//    }

    public function sayHelloAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }






    public function indexAction()
    {
        echo "helloł1";

    }

}