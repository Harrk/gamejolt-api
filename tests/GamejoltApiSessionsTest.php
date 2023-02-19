<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Sessions;

class GamejoltApiSessionsTest extends GamejoltApiBaseTest
{
    public function testSessions(): void
    {
        $sessions = $this->api->sessions();

        $this->assertEquals(Sessions::class, get_class($sessions));
    }
}
