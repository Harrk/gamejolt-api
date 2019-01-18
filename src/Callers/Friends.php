<?php

namespace Harrk\GameJoltApi\Callers;

class Friends extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/friends/fetch
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function fetch($username, $user_token) {
        return $this->call('friends', compact(
            'username', 'user_token'
        ));
    }

}
