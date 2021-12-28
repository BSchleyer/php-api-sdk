<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// gets power status
$dedicatedServerStartAction = $dsClient->dedicatedServer()->start("o3qzt");

if($dedicatedServerStartAction->isSuccessfull()){
    echo "Server started successfully";
}
else {
    echo "ERROR:";

    var_dump($dedicatedServerStartAction->getData());
}