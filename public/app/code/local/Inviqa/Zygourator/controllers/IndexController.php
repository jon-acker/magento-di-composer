<?php

class Inviqa_Zygourator_IndexController extends Inviqa_SymfonyContainer_Controller_Base
{
    public function indexAction()
    {
        $this->_container->get('acme.product.catalog')->findAll();

        $this->loadLayout();
        $this->renderLayout();
    }

 }