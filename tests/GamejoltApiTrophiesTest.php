<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Trophies;

class GamejoltApiTrophiesTest extends GamejoltApiBaseTest
{
    public function testTrophies(): void
    {
        $trophies = $this->api->trophies();

        $this->assertEquals(Trophies::class, get_class($trophies));
    }
}
