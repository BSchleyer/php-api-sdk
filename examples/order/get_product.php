<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

//$productName = "dedicated-server:h5HGC";
$productName = "vserver";

$productInfo = $dsClient->order()->getProduct($productName)->getData();

?>


<form action="place_order.php" method="post">
    <input type="hidden" name="productName" value="<?= $productInfo->name ?>">

    <h2>
        <?= $productInfo->display->name ?>
    </h2>
    <p>
        <?= $productInfo->display->description ?>
    </p>

    <?php

    $productOptions = $productInfo->options;

    if ($productInfo->type === "packages"):
        $productOptions = $productInfo->options->additional;

        // packages ?>
        <h3>Paket wählen:</h3>

        <select name="data[package]">
            <?php foreach ($productInfo->options->options as $name => $packageItem): ?>
                <option value="<?= $name ?>">
                    <?= $name ?> -

                    <?php foreach ($packageItem->contentItems as $itemName => $contentItem): ?>
                        <?= $contentItem->content ?> <?= $itemName ?>,
                    <?php endforeach; ?>

                    - <?= $packageItem->cost ?> €
                </option>
            <?php endforeach; ?>
        </select>

    <?php endif; ?>

    <h3>Konfiguration:</h3>

    <?php foreach ($productOptions as $name => $option):

        echo "<strong>{$name}</strong><br>";

        switch ($option->type) {
            case "select":
                echo "<select name='data[{$name}]'>";
                foreach ($option->options as $i => $selectItem):
                    echo "<option value='{$i}'>{$selectItem->display} (+ {$selectItem->cost} €)</option>";
                endforeach;
                echo "</select>";
                break;
            case "text":
                echo "<input type='text' name='data[{$name}]'>";
                break;
            case "number":
                echo "<input type='number' name='data[{$name}]' min='{$option->options->min}' value='{$option->options->min}' step='{$option->options->step}' max='{$option->options->max}'>";
                break;
        }

        echo "<br><br>";
    endforeach; ?>

    <h3>Laufzeit:</h3>
    <select name="period">
        <?php foreach ($productInfo->pricing->periods as $periodItem): ?>
            <option value="<?= $periodItem->uuid ?>">
                <?= $periodItem->displayName ?>
            </option>
        <?php endforeach; ?>
    </select>


    <h3>Standort:</h3>
    <select name="location">
        <?php foreach ($productInfo->locations as $locationItem): ?>
            <option value="<?= $locationItem->uuid ?>">
                <?= $locationItem->display->name ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <button type="submit">
        Bestellung kostenpflichtig absenden (place_order.php)
    </button>
</form>