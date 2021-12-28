<?php

namespace dashserv\api\Models;

use dashserv\api\APIResponse;
use GuzzleHttp\Exception\GuzzleException;

class Order extends Model {
    /**
     * Returns the product requested by name
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getProduct(string $productName) {
        $response = $this->getClient()->get("manage/product/{$productName}");

        return new APIResponse($response);
    }

    /**
     * Checks the current order status
     * @return APIResponse
     * @throws GuzzleException
     */
    public function checkOrder(string $orderUuid) {
        $response = $this->getClient()->get("manage/order/{$orderUuid}");

        return new APIResponse($response);
    }

    /**
     * Places the order for the given product with the options given in $data
     * @param string $productName
     * @param string|null $period
     * @param string $location
     * @param array $data
     * @return APIResponse
     * @throws GuzzleException
     */
    public function placeOrder(string $productName, ?string $period, string $location, array $data, bool $calculate = false) {
        $data['location'] = $location;
        if ($period !== null) {
            $data['interval'] = $period;
        }

        $orderData = array(
            "data" => $data,
            "calculate" => $calculate,
        );

        $response = $this->getClient()->post("manage/product/{$productName}", [
            'form_params' => $orderData,
        ]);

        return new APIResponse($response);
    }
}