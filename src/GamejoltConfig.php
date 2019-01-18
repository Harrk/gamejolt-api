<?php

namespace Harrk\GameJoltApi;

class GamejoltConfig {

    /**
     * @var string Game Jolt API Endpoint
     */
    protected $endpoint = 'https://api.gamejolt.com/api/game/v1_2/';

    /**
     * @var string Game Jolt game private key
     */
    protected $privateKey;

    /**
     * @var int Game Jolt game ID
     */
    protected $gameId;

    /**
     * @param int $gameId
     * @param string $privateKey
     * @param null|string $endpoint
     */
    public function __construct($gameId, $privateKey, $endpoint = null) {
        $this->privateKey = $privateKey;
        $this->gameId = $gameId;

        if (null !== $endpoint) {
            $this->endpoint = $endpoint;
        }
    }

    /**
     * Retrieve the game's private key
     * @return string
     */
    public function getPrivateKey() {
        return $this->privateKey;
    }

    /**
     * Retrieve the game's id
     * @return int
     */
    public function getGameId() {
        return $this->gameId;
    }

    /**
     * Retrieve Game Jolt's API endpoint
     * @return string
     */
    public function getEndpoint() {
        return $this->endpoint;
    }
}
