<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\Exceptions\InvalidParameterException;

class Sessions extends AbstractCaller {
    const STATUS_ACTIVE = 'active';
    const STATUS_IDLE = 'idle';

    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_IDLE,
    ];

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/open
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function open($username, $user_token) {
        return $this->call('sessions/open', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/ping
     *
     * @param string $username
     * @param string $user_token
     * @param string|null $status
     *
     * @return array
     *
     * @throws InvalidParameterException
     */
    public function ping($username, $user_token, string $status = null) {
        if (null !== $status) {
            if (! in_array($status, self::STATUSES)) {
                throw new InvalidParameterException(
                    'Status is outside of legal values ['. implode(',', self::STATUSES) .']'
                );
            }
        }

        return $this->call('sessions/ping', compact(
            'username', 'user_token', 'status'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/check
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function check($username, $user_token) {
        return $this->call('sessions/check', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/close
     *
     * @param string $username
     * @param string $user_token
     *
     * @return array
     */
    public function close($username, $user_token) {
        return $this->call('sessions/close', compact(
            'username', 'user_token'
        ));
    }
}
