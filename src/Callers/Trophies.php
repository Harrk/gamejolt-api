<?php

namespace Harrk\GameJoltApi\Callers;

class Trophies extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/fetch
     *
     * @param string $username
     * @param string $user_token
     * @param bool $achieved
     * @param integer[] $trophy_ids
     *
     * @return array
     */
    public function fetch($username, $user_token, $achieved = false, array $trophy_ids = []) {
        $trophy_id = implode(',', $trophy_ids);

        return $this->call('trophies', compact(
            'username', 'user_token', 'achieved', 'trophy_id'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/add-achieved
     *
     * @param string $username
     * @param string $user_token
     * @param integer $trophy_id
     *
     * @return array
     */
    public function addAchieved($username, $user_token, $trophy_id) {
        return $this->call('trophies/add-achieved', compact(
            'username', 'user_token', 'trophy_id'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/trophies/remove-achieved
     *
     * @param string $username
     * @param string $user_token
     * @param integer $trophy_id
     *
     * @return array
     */
    public function removeAchieved($username, $user_token, $trophy_id) {
        return $this->call('trophies/remove-achieved', compact(
            'username', 'user_token', 'trophy_id'
        ));
    }
}
