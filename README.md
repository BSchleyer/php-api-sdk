# Official dashserv API PHP SDK

The official PHP SDK for the dashserv API to order, manage and cancel products: https://docs.dashserv.io/

## Installation

Install the package using composer:

```bash
composer require dashserv/php-api-sdk
```

## Usage

``` php

$dsClient = new dashservApiClient("5srzVAPT0Kz0CME0Y5GTOfha4TKDC1rD");
foreach ($dsClient->vServer()->list()->getData() as $vserverItem) {
    // UUID: dIjw5 - Name: test (2 Kerne, 4 GB RAM, 60 GB SSD)
    echo "UUID: {$vserverItem->uuid} - Name: {$vserverItem->name} ({$vserverItem->options->cores} Kerne, {$vserverItem->options->ram} GB RAM, {$vserverItem->options->disk} GB SSD)\n";
}
```

Take a look on more examples for each product and many use cases [in the examples directory](examples/).

## LICENSE:

This software is distributed under the [MIT license](https://github.com/dashserv/php-api-sdk/blob/master/LICENSE).