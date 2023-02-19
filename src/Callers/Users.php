<?php

namespace Harrk\GameJoltApi\Callers;

class Users extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/users/fetch
     */
    public function fetch(string $username, string $user_token): array
    {
        return $this->call('users', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/users/auth
     */
    public function auth(string $username, string $user_token): array
    {
        return $this->call('users/auth', compact(
            'username', 'user_token'
        ));
    }
}
