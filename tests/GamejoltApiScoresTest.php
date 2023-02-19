<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\Scores;

class GamejoltApiScoresTest extends GamejoltApiBaseTest
{
    public function testScores(): void
    {
        $scores = $this->api->scores();

        $this->assertEquals(Scores::class, get_class($scores));
    }
}
