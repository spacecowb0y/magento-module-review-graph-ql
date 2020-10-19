# ReviewGraphQl

**ReviewGraphQl** provides endpoints for getting and creating the Product reviews by guest and logged in customers.

This is a port of Magento 2.4.1+ code for 2.3.x versions.

## Versions

This repository follows semantic versioning. The Major and Minor version numbers match the Magento version: 4.1.x contains the GraphQL module as it is in Magento 2.4.1. The patch version is left for internal fixes if needed.

## Installation

### Composer

You can install this module with the following command:
```
composer require front-commerce-magento/module-review-graph-ql:4.1.00
```

Please note that you will also have to patch the existing Magento Review module. The patch is automatically applied if your project [supports composer patches](https://github.com/cweagans/composer-patches). Otherwise you must follow the procedure documented below in the "Manual" installation regarding the `Config.php` file.

### Manual

To install manually, copy the content of this repository in your project's `app/code/Magento/ReviewGraphQl` directory.

Copy the[Config.php](https://github.com/magento/magento2/blob/32ed03cad4f2b2abc6ca6e5dc14885cd822c4508/app/code/Magento/Review/Model/Review/Config.php) file in the `/Model/Review` directory of the Magento Review module.
