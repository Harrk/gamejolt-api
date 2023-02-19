<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\Exceptions\InvalidParameterException;

class DataStore extends AbstractCaller {
    public const OPERATION_ADD = 'add';
    public const OPERATION_SUBTRACT = 'subtract';
    public const OPERATION_MULTIPLY = 'multiply';
    public const OPERATION_DIVIDE = 'divide';
    public const OPERATION_APPEND = 'append';
    public const OPERATION_PREPEND = 'prepend';

    public const OPERATIONS = [
        self::OPERATION_ADD,
        self::OPERATION_SUBTRACT,
        self::OPERATION_MULTIPLY,
        self::OPERATION_DIVIDE,
        self::OPERATION_APPEND,
        self::OPERATION_PREPEND,
    ];

    /**
     * @link https://gamejolt.com/game-api/doc/data-store/fetch
     */
    public function fetch(string $key, ?string $username = null, ?string $user_token = null): array
    {
        return $this->call('data-store', compact(
            'key', 'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/data-store/get-keys
     */
    public function getKeys(?string $pattern = null, ?string $username = null, ?string $user_token = null): array
    {
        return $this->call('data-store/get-keys', compact(
            'pattern', 'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/data-store/remove
     */
    public function remove(string $key, ?string $username = null, ?string $user_token = null): array
    {
        return $this->call('data-store/remove', compact(
            'key', 'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/data-store/set
     *
     * @param string $key
     * @param mixed $data
     * @param null|string $username
     * @param null|string $user_token
     *
     * @return mixed
     */
    public function set($key, $data, $username = null, $user_token = null) {
        return $this->call('data-store/set', compact(
            'key', 'data', 'username', 'user_token'
        ));
    }

    /**
     * @link https://gamejolt.com/game-api/doc/data-store/update
     *
     * @param string $key
     * @param string $operation
     * @param mixed $value
     * @param null|string $username
     * @param null|string $user_token
     *
     * @return array
     *
     * @throws InvalidParameterException
     */
    public function update($key, $operation, $value, $username = null, $user_token = null) {
        if (! in_array($operation, self::OPERATIONS)) {
            throw new InvalidParameterException(
                'Operation is outside of legal values ['. implode(',', self::OPERATIONS) .']'
            );
        }

        return $this->call('data-store/set', compact(
            'key', 'operation', 'value', 'username', 'user_token'
        ));
    }
}
