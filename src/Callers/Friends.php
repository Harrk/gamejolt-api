<?php

namespace Harrk\GameJoltApi\Callers;

class Friends extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/friends/fetch
     */
    public function fetch(string $username, string $user_token): array
    {
        return $this->call('friends', compact(
            'username', 'user_token'
        ));
    }

}
