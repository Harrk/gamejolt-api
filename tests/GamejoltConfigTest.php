<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\GamejoltConfig;
use PHPUnit\Framework\TestCase;

class GamejoltConfigTest extends TestCase {

    /**
     * @var GamejoltConfig
     */
    private $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = new GamejoltConfig(
            0,
            'my-game-private-key'
        );
    }

    public function testConfigGameId(): void
    {
        $this->assertEquals(0, $this->config->getGameId());
    }

    public function testConfigPrivateKey(): void
    {
        $this->assertEquals('my-game-private-key', $this->config->getPrivateKey());
    }

    public function testConfigEndpoint(): void
    {
        $this->assertEquals('https://api.gamejolt.com/api/game/v1_2/', $this->config->getEndpoint());
    }
}
