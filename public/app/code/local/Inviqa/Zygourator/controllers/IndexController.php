<?php

class Inviqa_Zygourator_IndexController extends Mage_Core_Controller_Front_Action
{
    use Inviqa_SymfonyContainer_Helper_ServiceProvider;

    public function indexAction()
    {
        $this->getService('acme.product.catalog')->findAll();

        $this->loadLayout();
        $this->renderLayout();
    }

 }