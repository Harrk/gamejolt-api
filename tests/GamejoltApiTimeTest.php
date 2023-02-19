<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Time;

class GamejoltApiTimeTest extends GamejoltApiBaseTest
{
    public function testTime(): void
    {
        $time = $this->api->time();

        $this->assertEquals(Time::class, get_class($time));
    }
}
