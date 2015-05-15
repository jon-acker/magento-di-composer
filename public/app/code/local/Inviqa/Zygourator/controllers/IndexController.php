<?php

class Inviqa_Zygourator_IndexController extends Inviqa_SymfonyContainer_Controller_Base
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

 }