<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\DataStore;
use Harrk\GameJoltApi\Callers\Friends;
use Harrk\GameJoltApi\Callers\Scores;
use Harrk\GameJoltApi\Callers\Sessions;
use Harrk\GameJoltApi\Callers\Time;
use Harrk\GameJoltApi\Callers\Trophies;
use Harrk\GameJoltApi\Callers\Users;
use Harrk\GameJoltApi\GamejoltApi;
use Harrk\GameJoltApi\GamejoltConfig;
use PHPUnit\Framework\TestCase;

class GamejoltApiTest extends TestCase {
    /**
     * @var GamejoltApi
     */
    private $api;

    protected function setUp(): void {
        parent::setUp();

        $config = new GamejoltConfig(
            'my-game-id',
            'my-game-private-key'
        );

        $this->api = new GamejoltApi($config);
    }

    public function testDataStore() {
        $dataStore = $this->api->dataStore();

        $this->assertEquals(DataStore::class, get_class($dataStore));
    }

    public function testFriends() {
        $friends = $this->api->friends();

        $this->assertEquals(Friends::class, get_class($friends));
    }

    public function testScores() {
        $scores = $this->api->scores();

        $this->assertEquals(Scores::class, get_class($scores));
    }

    public function testSessions() {
        $sessions = $this->api->sessions();

        $this->assertEquals(Sessions::class, get_class($sessions));
    }

    public function testTime() {
        $time = $this->api->time();

        $this->assertEquals(Time::class, get_class($time));
    }

    public function testTrophies() {
        $trophies = $this->api->trophies();

        $this->assertEquals(Trophies::class, get_class($trophies));
    }

    public function testUsers() {
        $users = $this->api->users();

        $this->assertEquals(Users::class, get_class($users));
    }
}
