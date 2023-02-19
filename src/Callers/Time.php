<?php

namespace Harrk\GameJoltApi\Callers;

class Time extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/time/fetch
     */
    public function fetch(): array
    {
        return $this->call('time/time');
    }

}
