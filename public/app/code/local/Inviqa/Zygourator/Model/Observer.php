<?php


class Inviqa_Zygourator_Model_Observer
{
    public function onProductCollectionLoadBefore(Varien_Event_Observer $observer)
    {
        $collection = $observer->getCollection();

        if ($collection instanceof Product\ProductCollection) {
            $container = Mage::helper('inviqa_symfonyContainer/containerProvider')->getContainer();
            $container->get('inviqa.product.processor')->process($collection);
        }
    }
} 