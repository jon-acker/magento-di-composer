<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper as ContainerDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$cachedContainer = 'var/cache/container.php';

/**
 * @return ContainerBuilder
 */
function buildContainer()
{
    $container = new ContainerBuilder();
    $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
    $loader->load('services.yml');

    return $container;
}

if (isset($_SERVER['MAGE_IS_DEVELOPER_MODE'])) {
    $container = buildContainer();
} else {
    // if already cached - use that one
    if (file_exists($cachedContainer))
    {
        require_once $cachedContainer;
        $container = new ProjectServiceContainer();
    } else {
        // otherwise compile and store it
        $container = buildContainer();
        $container->compile();
        $dumper = new ContainerDumper($container);
        file_put_contents($cachedContainer, $dumper->dump());
    }
}

Mage::register('container', $container);
