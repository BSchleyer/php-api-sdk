<?php

namespace dashserv\api\Models;

use dashserv\api\APIResponse;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Model {
    /** @var Client */
    private $client;

    /**
     * Model constructor.
     * @param Client $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client {
        return $this->client;
    }
}