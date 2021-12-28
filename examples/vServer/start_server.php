<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// gets power status
$vServerStartAction = $dsClient->vServer()->start("dIjw5");

if($vServerStartAction->isSuccessfull()){
    echo "Server started successfully. Task: {$vServerStartAction->getData()}";
}
else {
    echo "ERROR:";

    var_dump($vServerStartAction->getData());
}