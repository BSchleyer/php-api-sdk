<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */


$productList = $dsClient->account()->getProducts()->getData();

?>

<table>
    <thead>
    <tr>
        <th>Produkt</th>
        <th>Status</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($productList as $productItem): ?>
    <tr>
        <td>
            <?= $productItem->product->name ?> #<?= $productItem->product->uuid ?>
        </td>
        <td>
            <?= $productItem->status ?>
        </td>
        <td>
            <?= $productItem->name ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>