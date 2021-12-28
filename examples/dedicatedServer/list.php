<?php

require_once __DIR__ . '/../bootstrap.php';
/** @var $dsClient \dashserv\api\dashservApiClient */

foreach ($dsClient->dedicatedServer()->list()->getData() as $dedicatedServerItem){
    echo "UUID: {$dedicatedServerItem->uuid} - Name: {$dedicatedServerItem->name} ({$dedicatedServerItem->device->model->cpu->amount}x {$dedicatedServerItem->device->model->cpu->name}, {$dedicatedServerItem->device->model->ram->amount} GB {$dedicatedServerItem->device->model->ram->type}, {$dedicatedServerItem->device->model->disks->string})\n";
}