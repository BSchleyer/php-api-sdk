<?php

use dashserv\api\dashservApiClient;
use GuzzleHttp\Exception\GuzzleException;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

if ($_SERVER['REQUEST_METHOD'] !== "POST")
    die("Please first use get_product.php to configure the product in order to place an order!");

try {
    $response = $dsClient->order()->placeOrder($_POST['productName'], $_POST['period'] ?? null, $_POST['location'], $_POST['data']);
} catch (GuzzleException $e) {
    die("Error while placing order: " . $e->getMessage());
}

if(!$response->isSuccessfull()){
    // Beispiel: "Der dedizierte Server ist scheinbar nicht mehr verfügbar."
    echo "(!) Fehler während der Bestellung: " . $response->getData();
} else {
    echo "Bestellnummer: {$response->getData()} <a href='check_order.php?orderuuid={$response->getData()}'>Bestellstatus prüfen</a>";
}
