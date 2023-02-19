<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Users;

class GamejoltApiUsersTest extends GamejoltApiBaseTest
{
    public function testUsers(): void
    {
        $users = $this->api->users();

        $this->assertEquals(Users::class, get_class($users));
    }
}
