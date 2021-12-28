<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

// get the server
$dedicatedServerModels = $dsClient->dedicatedServer()->getMarketplace(); ?>

<pre>
<?php foreach ($dedicatedServerModels->getData() as $dedicatedServerItem): ?>
<?= ($dedicatedServerItem->stock > 0) ? 'IN STOCK' : '(!) OUT OF STOCK' ?>  <?= $dedicatedServerItem->cpu->amount?>x <?= $dedicatedServerItem->cpu->name?>, <?= $dedicatedServerItem->ram->amount?> GB <?= $dedicatedServerItem->ram->type?>, <?= $dedicatedServerItem->disks->string?><br>
<?php endforeach; ?>
</pre>