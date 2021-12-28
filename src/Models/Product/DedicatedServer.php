<?php

namespace dashserv\api\Models\Product;

use dashserv\api\APIResponse;
use dashserv\api\Models\Model;
use dashserv\api\Models\ProductModel;
use GuzzleHttp\Exception\GuzzleException;

class DedicatedServer extends ProductModel {
    /**
     * @return string
     */
    public function getProductName(): string {
        return "dedicated-server";
    }

    /**
     * Returns the list of all dedicated servers in your account
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getMarketplace() {
        $response = $this->getClient()->get('product/dedicated-server/models');

        return new APIResponse($response);
    }

    /**
     * Starts the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function start(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/actions/start");

        return new APIResponse($response);
    }

    /**
     * Shutdowns the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function shutdown(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/actions/shutdown");

        return new APIResponse($response);
    }

    /**
     * Force stops the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function stop(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/actions/stop");

        return new APIResponse($response);
    }

    /**
     * Power resets the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function reset(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/actions/reset");

        return new APIResponse($response);
    }



    /**
     * Gets the network information for the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getNetworkInformation(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/network");

        return new APIResponse($response);
    }

    /**
     * Gets the temperature and fan sensors of the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getSensors(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/sensor");

        return new APIResponse($response);
    }

    /**
     * Gets the temperature and fan sensors of the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getIpmiData(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/ipmidata");

        return new APIResponse($response);
    }

    /**
     * Disables IPMI
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function disableIpmi(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/ipmi/disable");

        return new APIResponse($response);
    }

    /**
     * Enables IPMI
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function enableIpmi(string $serverUuid) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/ipmi/enable");

        return new APIResponse($response);
    }
}