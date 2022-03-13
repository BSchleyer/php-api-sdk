<?php

namespace dashserv\api\Models;

use dashserv\api\APIResponse;
use GuzzleHttp\Exception\GuzzleException;

class Account extends Model {
    /**
     * Returns the user information from the used api key
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getUserInfo() {
        $response = $this->getClient()->get("account/user");

        return new APIResponse($response);
    }

    /**
     * Gets all products (also deleted and locked ones)
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getProducts() {
        $response = $this->getClient()->get("account/products");

        return new APIResponse($response);
    }

    /**
     * Gets all transactions
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getTransactions() {
        $response = $this->getClient()->get("account/transactions");

        return new APIResponse($response);
    }

    /**
     * Gets all invoices
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getInvoices() {
        $response = $this->getClient()->get("account/invoices");

        return new APIResponse($response);
    }
}