<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\GamejoltConfig;
use PHPUnit\Framework\TestCase;

class GamejoltConfigTest extends TestCase {

    /**
     * @var GamejoltConfig
     */
    private $config;

    protected function setUp() {
        parent::setUp();

        $this->config = new GamejoltConfig(
            'my-game-id',
            'my-game-private-key'
        );
    }

    public function testConfigGameId() {
        $this->assertEquals('my-game-id', $this->config->getGameId());
    }

    public function testConfigPrivateKey() {
        $this->assertEquals('my-game-private-key', $this->config->getPrivateKey());
    }

    public function testConfigEndpoint() {
        $this->assertEquals('https://api.gamejolt.com/api/game/v1_2/', $this->config->getEndpoint());
    }
}
