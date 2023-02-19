<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Friends;

class GamejoltApiFriendsTest extends GamejoltApiBaseTest
{
    public function testFriends(): void
    {
        $friends = $this->api->friends();

        $this->assertEquals(Friends::class, get_class($friends));
    }
}
