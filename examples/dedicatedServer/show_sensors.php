<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// gets power status
$dedicatedServerSensors = $dsClient->dedicatedServer()->getSensors("o3qzt");

foreach ($dedicatedServerSensors->getData() as $group => $children): ?>
    <h2><?= ucfirst($group) ?></h2>

    <pre>
<?php foreach ($children as $sensorItem): ?>
<?= $sensorItem->sensor ?>   <?= $sensorItem->value ?><br>
<?php endforeach; ?>
    </pre>

    <br><br>
<?php endforeach; ?>
