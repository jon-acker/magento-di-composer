# Magento with composer autoloader and symfony DI container

## Background

This is a proof-of-concept/example of how Magento can be used with Composers autoloader and Synfonys DI container, in order to try to decouple the core domain logic from the Magento framework.

In order to load dependencies before starting Magento, I moved index.php to index_mage.php and created a new index.php which loader tha autloader, builds and configures the DI container, and then calls index_mage.php
The container, once built, is placed into Magento's registery.

The services.yml contains an example of how the DI components factory methods can be used to turn Magento models into services that can be injected.

The core domain logic can go into the "src/" folder. In the example a magento catalog collection is passed to a Finder as a dependency using a interface defined within the core domain, effectively decoupling the core domain from the framework:
```php
namespace Product;

class Finder
{
    /**
     * @var Catalog
     */
    private $catalog;
    public function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }
    public function findAll()
    {
        return $this->catalog->getCollection();
    }
}
```

There is an one simple magento module set up that uses the container, with an example controller looking like this:
```php
class Acme_Zygourator_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $finder = Mage::registry('container')->get('acme.product.finder');
        $products = $finder->findAll();
    }
}
```

## Clone the project

Clone the project into your local file system:

```bash
git clone git@github.com:inviqa/magentoce-test
```

## Install Dependencies

1. Ensure you are using a ruby managed by rbenv / RVM as system rubies can cause issues. Currently [rbenv](https://github.com/sstephenson/rbenv) is the recommended version manager.

2. Install the latest version of Vagrant from [http://www.vagrantup.com/downloads.html](http://www.vagrantup.com/downloads.html)

3. Install/Update hobo:

    ```bash
    gem install hobo-inviqa
    ```
## Provision Environment

You can now build the development environment for the first time. In the project directory, execute the following command:

    $ hobo vm up

You should now be able to access the site at [http://magentoce-test.dev](http://magentoce-test.dev)

## Hobo Usage

With the hobo enabled environment up and running please make use of the following commands for day to day usage.

```bash
hobo vm start  # Starts the vm without the overhead of provisioning
hobo vm stop   # Graceful halt of the vm
hobo vm ssh    # Start an SSH session on the VM
hobo vm mysql  # Connect to the database on the VM
```
