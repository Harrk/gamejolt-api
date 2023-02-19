<?php

namespace Harrk\GameJoltApi;

class GamejoltConfig {
    protected string $endpoint = 'https://api.gamejolt.com/api/game/v1_2/';
    protected string $privateKey;
    protected int $gameId;

    public function __construct(int $gameId, string $privateKey, ?string $endpoint = null)
    {
        $this->privateKey = $privateKey;
        $this->gameId = $gameId;

        if (null !== $endpoint) {
            $this->endpoint = $endpoint;
        }
    }

    /**
     * Retrieve the game's private key
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * Retrieve the game's id
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * Retrieve Game Jolt's API endpoint
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
