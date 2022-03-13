<?php

namespace dashserv\api;

use dashserv\api\Models\Account;
use dashserv\api\Models\Product\DedicatedServer;
use dashserv\api\Models\Order;
use dashserv\api\Models\Product\VServer;
use GuzzleHttp\Client;

class dashservApiClient {
    /** @var string */
    private string $apiToken;

    /** @var string */
    private string $apiUrl;

    /** @var Client */
    private Client $client;

    /**
     * dashservApiClient constructor.
     * @param string $apiToken
     * @param string $apiUrl
     */
    public function __construct(string $apiToken, string $apiUrl = "https://api.dashserv.io/v1/") {
        $this->apiToken = $apiToken;
        $this->apiUrl = $apiUrl;

        $this->client = new Client([
            'base_uri' => $apiUrl,
            'headers' => [
                'User-Agent' => 'dashserv-api-php-sdk',
                'Authorization' => 'Bearer ' . $apiToken,
                'Content-Type' => 'application/json',
            ],
                'verify' => false
        ]);
    }


    /**
     * @return DedicatedServer
     */
    public function dedicatedServer(): DedicatedServer {
        return new DedicatedServer($this->client);
    }

    /**
     * @return VServer
     */
    public function vServer(): VServer {
        return new VServer($this->client);
    }

    /**
     * @return Order
     */
    public function order(): Order {
        return new Order($this->client);
    }

    /**
     * @return Account
     */
    public function account(): Account {
        return new Account($this->client);
    }

}