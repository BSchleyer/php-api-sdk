<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// get the server
$dedicatedServerItem = $dsClient->dedicatedServer()->get("o3qzt");

// gets power status
$dedicatedServerStatus = $dsClient->dedicatedServer()->status("o3qzt");

echo "The power status of the server is <b>{$dedicatedServerStatus->getData()->status}</b>!<br><br>Server information:"

?>

<pre><?php print_r($dedicatedServerItem->getData()); ?></pre>