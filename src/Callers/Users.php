<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\ApiCaller;

class Users extends  AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/users/fetch
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function fetch($username, $user_token) {
        return $this->call('users', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/users/auth
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function auth($username, $user_token) {
        return $this->call('users/auth', compact(
            'username', 'user_token'
        ));
    }
}
