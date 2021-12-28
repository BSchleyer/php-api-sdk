<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// gets power status
$vServerShutdownAction = $dsClient->vServer()->shutdown("dIjw5");

if ($vServerShutdownAction->isSuccessfull()) {
    echo "Server shutdowned successfully. Task: {$vServerShutdownAction->getData()}";
} else {
    echo "ERROR:";

    var_dump($vServerShutdownAction->getData());
}