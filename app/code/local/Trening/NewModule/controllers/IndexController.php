<?php
/**
 * Created by PhpStorm.
 * User: chiny
 * Date: 2017-01-16
 * Time: 03:40
 */

class Trening_NewModule_IndexController extends Mage_Core_Controller_Front_Action{
    /**
     * dla url localhost/.../trening/index/sayHello/id/5/foo/bar
     * array
        'id' => '5'
        'foo' => 'bar'
     * */
    public function sayHelloAction()
    {
        var_dump($this->getRequest()->getParams());

    }
    public function indexAction()
    {
        echo "helloł1";

    }

}