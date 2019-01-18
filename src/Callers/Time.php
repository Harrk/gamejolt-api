<?php

namespace Harrk\GameJoltApi\Callers;

class Time extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/time/fetch
     *
     * @return array
     */
    public function fetch() {
        return $this->call('time/time');
    }

}
