<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */


$orderStatus = $dsClient->order()->checkOrder($_GET['orderuuid'])->getData(); ?>

<h3>
    Bestellung <?= $orderStatus->uuid ?>
</h3>

<pre>
Produkt:    <?= $orderStatus->product->display->name ?><br>
Status:     <?= $orderStatus->status ?><br>
Erstellt:   <?= date("d.m.Y H:i:s", $orderStatus->unix->created) ?><br>
Bearbeitet: <?= $orderStatus->unix->ready ? date("d.m.Y H:i:s", $orderStatus->unix->ready) : '-' ?>
</pre>