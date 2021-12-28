<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// get the server
$vServerItem = $dsClient->vServer()->get("dIjw5")->getData();

// gets power status
$vServerStatus = $dsClient->vServer()->status("dIjw5")->getData();
$vServerBackups = $dsClient->vServer()->getBackups("dIjw5")->getData();

echo "The vServer is <b>{$vServerStatus->status}</b>!";

?>

<pre>
Image:        <?= $vServerItem->image->displayName ?><br>
Location:     <?= $vServerItem->location->display->name ?><br>
IPv4:         <?= $vServerItem->network->public->ipv4->ip ?><br>
IPv4:         <?= $vServerItem->network->public->ipv6->ip ?><br><br>

CPU usage:    <?= $vServerStatus->stats->cpu->usage ?> % of <?= $vServerStatus->stats->cpu->cores ?> cores<br>
RAM usage:    <?= $vServerStatus->stats->ram->usage ?> % of <?= round(($vServerStatus->stats->ram->max / 1.074e+9),2) ?> GiB<br>
</pre>

<h3>Backups:</h3>

<?php foreach ($vServerBackups as $backupItem):
    // Test - CREATING - 0 GiB ?>
    <?= $backupItem->name ?> - <?= $backupItem->status ?> - <?= round($backupItem->size / 1.074e+9,2) ?> GiB<br>
<?php endforeach; ?>
