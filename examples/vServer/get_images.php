<?php

require_once __DIR__ . '/../bootstrap.php';
/** @var $dsClient \dashserv\api\dashservApiClient */

echo '<select>';
foreach ($dsClient->vServer()->getImages()->getData() as $imageItem){
    echo "<option value='{$imageItem->name}'>{$imageItem->displayName}</option>";
} ?>
</select>