<?php

namespace dashserv\api\Models;

use dashserv\api\APIResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class ProductModel extends Model {
    abstract public function getProductName();

    /**
     * Returns the list of all items of the product in your account
     * @return APIResponse
     * @throws GuzzleException
     */
    public function list() {
        $response = $this->getClient()->get("product/{$this->getProductName()}");

        return new APIResponse($response);
    }

    /**
     * Returns the requested product
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function get(string $serverUuid) {
        $response = $this->getClient()->get("product/{$this->getProductName()}/{$serverUuid}");

        return new APIResponse($response);
    }

    /**
     * Returns the status of the requested product
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function status(string $serverUuid) {
        $response = $this->getClient()->get("product/{$this->getProductName()}/{$serverUuid}/status");

        return new APIResponse($response);
    }
}