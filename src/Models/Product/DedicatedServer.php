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
     * Returns all available os templates
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getTemplates() {
        $response = $this->getClient()->get("product/dedicated-server/templates");

        return new APIResponse($response);
    }

    /**
     * Gets the temperature and fan sensors of the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     * @deprecated This endpoint temporarly does not return any data
     */
    public function getSensors(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/sensor");

        return new APIResponse($response);
    }

    /**
     * Returns the console url
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getConsole(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/console");

        return new APIResponse($response);
    }

    /**
     * Starts a reinstallation of the operating system - this cannot be undone!
     * @param string $serverUuid
     * @param string $hostname
     * @param int $templateId, see getTemplates()
     * @return APIResponse
     * @throws GuzzleException
     */
    public function reinstallServer(string $serverUuid, string $hostname, int $templateId) {
        $response = $this->getClient()->post("product/dedicated-server/{$serverUuid}/installation/create", [
            'form_params' => [
                "template" => $templateId,
                "hostname" => $hostname
            ]
        ]);

        return new APIResponse($response);
    }

    /**
     * Gets the current installation status
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function installationStatus(string $serverUuid) {
        $response = $this->getClient()->get("product/dedicated-server/{$serverUuid}/installation/status");

        return new APIResponse($response);
    }
}