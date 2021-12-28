<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// gets power status
$dedicatedServerShutdownAction = $dsClient->dedicatedServer()->shutdown("o3qzt");

if ($dedicatedServerShutdownAction->isSuccessfull()) {
    echo "Server shutdowned successfully";
} else {
    echo "ERROR:";

    var_dump($dedicatedServerShutdownAction->getData());
}