<?php

namespace Harrk\GameJoltApi\Callers;

class Scores extends AbstractCaller {

    /**
     * @link https://gamejolt.com/game-api/doc/scores/fetch
     */
    public function fetch(
        ?string $username = null,
        ?string $user_token = null,
        ?int $table_id = null,
        ?int $limit = null,
        ?string $guest = null,
        ?int $better_than = null,
        ?int $worse_than = null
    ): array
    {
        return $this->call('scores', compact(
            'username', 'user_token', 'table_id', 'limit', 'guest', 'better_than', 'worse_than'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/tables
     */
    public function tables(): array
    {
        return $this->call('scores/tables');
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/add
     */
    public function addUserScore(
        string $username,
        string $user_token,
        string $score,
        int $sort,
        ?int $table_id = null,
        ?string $extra_data = null
    ): array
    {
        return $this->call('scores/add', compact(
            'username', 'user_token', 'score', 'sort', 'table_id', 'extra_data'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/add
     */
    public function addGuestScore(
        string $guest,
        string $score,
        int $sort,
        ?int $table_id = null,
        ?string $extra_data = null
    ): array
    {
        return $this->call('scores/add', compact(
            'guest', 'score', 'sort', 'table_id', 'extra_data'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/scores/get-rank
     */
    public function getRank(int $sort, ?int $table_id = null): array
    {
        return $this->call('scores/get-rank', compact('sort', 'table_id'));
    }
}
