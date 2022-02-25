# module-productcustomattribute
Assignment 1 : Products attributes are dynamically generated for each product based on the business condition.

# Installation steps
composer require composer require poongud/module-productcustomattribute
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:clean
