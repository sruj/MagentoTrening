<?php
/**
 * Created by PhpStorm.
 * User: chiny
 * Date: 2017-01-16
 * Time: 03:40
 */

class TutsPlus_Demo_IndexController extends Mage_Core_Controller_Front_Action{


    public function sayHelloAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }






    public function indexAction()
    {
        echo "hello";

    }

}