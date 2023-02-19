<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\Exceptions\InvalidParameterException;

class Sessions extends AbstractCaller {
    public const STATUS_ACTIVE = 'active';
    public const STATUS_IDLE = 'idle';

    public const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_IDLE,
    ];

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/open
     */
    public function open(string $username, string $user_token): array
    {
        return $this->call('sessions/open', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/ping
     *
     * @throws InvalidParameterException
     */
    public function ping(string $username, string $user_token, ?string $status = null): array
    {
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
     */
    public function check(string $username, string $user_token): array
    {
        return $this->call('sessions/check', compact(
            'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/sessions/close
     */
    public function close(string $username, string $user_token): array
    {
        return $this->call('sessions/close', compact(
            'username', 'user_token'
        ));
    }
}
