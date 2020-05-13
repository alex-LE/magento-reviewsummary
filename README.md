### Overview

Magento does not provide a REST API Endpoint to get the reviews/ratings from a product.
This Module implements an endpoint to get the rating summary for a single product (by SKU).

### Install

Use composer to install this module. From your Magento 2 folder run:

```bash
composer require alex-le/magento2-review-summary
php bin/magento setup:upgrade 
```

### Usage

Create an API Token and provide access to Marketing -> User Content -> Reviews

Use the following API Endpoint:

| Endpoint | Request method |
| ------------- | ------------- |
| /V1/products/:sku/review-summary | GET |
