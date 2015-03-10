<?php


class Acme_Zygourator_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $finder = Mage::registry('container')->get('acme.product.finder');

        $products = $finder->findAll();
    }
}