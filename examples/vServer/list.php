<?php

require_once __DIR__ . '/../bootstrap.php';
/** @var $dsClient \dashserv\api\dashservApiClient */

foreach ($dsClient->vServer()->list()->getData() as $vserverItem) {
    // UUID: dIjw5 - Name: test (2 cores, 4 GB RAM, 60 GB SSD)
    echo "UUID: {$vserverItem->uuid} - Name: {$vserverItem->name} ({$vserverItem->options->cores} Kerne, {$vserverItem->options->ram} GB RAM, {$vserverItem->options->disk} GB SSD)\n";
}