<?php

namespace Harrk\GameJoltApi;

use Harrk\GameJoltApi\Callers\DataStore;
use Harrk\GameJoltApi\Callers\Friends;
use Harrk\GameJoltApi\Callers\Scores;
use Harrk\GameJoltApi\Callers\Sessions;
use Harrk\GameJoltApi\Callers\Time;
use Harrk\GameJoltApi\Callers\Trophies;
use Harrk\GameJoltApi\Callers\Users;

class GamejoltApi {
    protected GamejoltConfig $gameJoltConfig;

    /**
     * Initialise the API with a provided config
     */
    public function __construct(GamejoltConfig $gamejoltConfig)
    {
        $this->gameJoltConfig = $gamejoltConfig;
    }

    /**
     * Access the time API
     */
    public function time(): Time
    {
        return new Time($this->gameJoltConfig);
    }

    /**
     * Access the trophies API
     */
    public function trophies(): Trophies
    {
        return new Trophies($this->gameJoltConfig);
    }

    /**
     * Access the users API
     */
    public function users(): Users
    {
        return new Users($this->gameJoltConfig);
    }

    /**
     * Access the sessions API
     */
    public function sessions(): Sessions
    {
        return new Sessions($this->gameJoltConfig);
    }

    /**
     * Access the scores API
     */
    public function scores(): Scores
    {
        return new Scores($this->gameJoltConfig);
    }

    /**
     * Access the dataStore API
     */
    public function dataStore(): DataStore
    {
        return new DataStore($this->gameJoltConfig);
    }

    /**
     * Access the friends API
     */
    public function friends(): Friends
    {
        return new Friends($this->gameJoltConfig);
    }

}
