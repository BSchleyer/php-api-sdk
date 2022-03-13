<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */


$userInfo = $dsClient->account()->getUserInfo()->getData(); ?>

<h3>
    <?= $userInfo->user->customer->firstName ?> <?= $userInfo->user->customer->lastName ?> (<?= $userInfo->user->customer->email ?>)
</h3>

<pre>
Guthaben:   <?= number_format($userInfo->user->balance->amount, 2, ",", ".") ?> €

<?= json_encode($userInfo, JSON_PRETTY_PRINT) ?>
</pre>