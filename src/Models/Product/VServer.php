<?php

namespace dashserv\api\Models\Product;

use dashserv\api\APIResponse;
use dashserv\api\Models\ProductModel;
use GuzzleHttp\Exception\GuzzleException;

class VServer extends ProductModel {
    /**
     * @return string
     */
    public function getProductName(): string {
        return "vserver";
    }

    /**
     * Returns all available images for re-installation
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getImages() {
        $response = $this->getClient()->get("product/vserver/image");

        return new APIResponse($response);
    }

    /**
     * Starts the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function start(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/actions/start");

        return new APIResponse($response);
    }

    /**
     * Shutdowns the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function shutdown(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/actions/shutdown");

        return new APIResponse($response);
    }

    /**
     * Force stops the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function stop(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/actions/stop");

        return new APIResponse($response);
    }

    /**
     * Gracefully restarts the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function restart(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/actions/restart");

        return new APIResponse($response);
    }

    /**
     * Power resets the server
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function reset(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/actions/reset");

        return new APIResponse($response);
    }


    /**
     * Starts re-installation of vserver
     * @param string $serverUuid
     * @param string $imageName $name of the image
     * @return APIResponse
     * @throws GuzzleException
     */
    public function reinstall(string $serverUuid, string $imageName) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/reinstall", [
            'form_params' => [
                "image" => $imageName
            ]
        ]);

        return new APIResponse($response);
    }

    /**
     * Requests root password reset via qemu-guest-agent
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function resetPassword(string $serverUuid) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/password");

        return new APIResponse($response);
    }

    /**
     * Lists all backups available for the vserver
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function getBackups(string $serverUuid) {
        $response = $this->getClient()->get("product/vserver/{$serverUuid}/backup");

        return new APIResponse($response);
    }

    /**
     * Creates a new backup
     * @param string $serverUuid
     * @param string $backupName
     * @return APIResponse
     * @throws GuzzleException
     */
    public function createBackup(string $serverUuid, string $backupName) {
        $response = $this->getClient()->post("product/vserver/{$serverUuid}/backup", [
            'form_params' => [
                "name" => $backupName
            ]
        ]);

        return new APIResponse($response);
    }

    /**
     * Deletes the given backup
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function deleteBackup(string $serverUuid, string $backupUuid) {
        $response = $this->getClient()->delete("product/vserver/{$serverUuid}/backup/{$backupUuid}");

        return new APIResponse($response);
    }

    /**
     * Restores the given backup
     * @param string $serverUuid
     * @return APIResponse
     * @throws GuzzleException
     */
    public function restoreBackup(string $serverUuid, string $backupUuid) {
        $response = $this->getClient()->put("product/vserver/{$serverUuid}/backup");

        return new APIResponse($response);
    }
}