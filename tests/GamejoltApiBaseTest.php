<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\GamejoltApi;
use Harrk\GameJoltApi\GamejoltConfig;
use PHPUnit\Framework\TestCase;

abstract class GamejoltApiBaseTest extends TestCase
{
    protected GamejoltApi $api;

    protected function setUp(): void
    {
        parent::setUp();

        $config = new GamejoltConfig(
            0,
            'my-game-private-key'
        );

        $this->api = new GamejoltApi($config);
    }
}
