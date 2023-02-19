<?php

namespace Harrk\GameJoltApi\Callers;

class Trophies extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/fetch
     */
    public function fetch(string $username, string $user_token, bool $achieved = false, array $trophy_ids = []): array
    {
        $trophy_id = implode(',', $trophy_ids);

        return $this->call('trophies', compact(
            'username', 'user_token', 'achieved', 'trophy_id'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/add-achieved
     */
    public function addAchieved(string $username, string $user_token, int $trophy_id): array
    {
        return $this->call('trophies/add-achieved', compact(
            'username', 'user_token', 'trophy_id'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/remove-achieved
     */
    public function removeAchieved(string $username, string $user_token, int $trophy_id): array
    {
        return $this->call('trophies/remove-achieved', compact(
            'username', 'user_token', 'trophy_id'
        ));
    }
}
