<?php

namespace Harrk\GameJoltApi\Callers;

class Scores extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/scores/fetch
     *
     * @param null|string $username
     * @param null|string $user_token
     * @param null|integer $table_id
     * @param null|integer $limit
     * @param null|string $guest
     * @param null|integer $better_than
     * @param null|integer $worse_than
     *
     * @return array
     */
    public function fetch($username = null, $user_token = null, $table_id = null, $limit = null, $guest = null, $better_than = null, $worse_than = null) {
        return $this->call('scores', compact(
            'username', 'user_token', 'table_id', 'limit', 'guest', 'better_than', 'worse_than'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/tables
     *
     * @return array
     */
    public function tables() {
        return $this->call('scores/tables');
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/add
     *
     * @param string $username
     * @param string $user_token
     * @param string $score
     * @param integer $sort
     * @param null|integer $table_id
     * @param null|string $extra_data
     *
     * @return array
     */
    public function addUserScore($username, $user_token, $score, $sort, $table_id = null, $extra_data = null) {
        return $this->call('scores/add', compact(
            'username', 'user_token', 'score', 'sort', 'table_id', 'extra_data'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/add
     *
     * @param string $guest
     * @param string $score
     * @param integer $sort
     * @param null|integer $table_id
     * @param null|string $extra_data
     *
     * @return array
     */
    public function addGuestScore($guest, $score, $sort, $table_id = null, $extra_data = null) {
        return $this->call('scores/add', compact(
            'guest', 'score', 'sort', 'table_id', 'extra_data'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/get-rank
     *
     * @param integer $sort
     * @param null|integer $table_id
     *
     * @return array
     */
    public function getRank($sort, $table_id = null) {
        return $this->call('scores/get-rank', compact('sort', 'table_id'));
    }
}
