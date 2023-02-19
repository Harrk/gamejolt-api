<?php

namespace Harrk\GameJoltApi\Tests;

use Harrk\GameJoltApi\Callers\DataStore;

class GamejoltApiDataStoreTest extends GamejoltApiBaseTest
{
    public function testDataStore(): void
    {
        $dataStore = $this->api->dataStore();

        $this->assertEquals(DataStore::class, get_class($dataStore));
    }
}
