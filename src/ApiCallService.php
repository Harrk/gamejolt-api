<?php

namespace Harrk\GameJoltApi;

use GuzzleHttp\Client;
use Harrk\GameJoltApi\Exceptions\TimeOutException;
use Harrk\GameJoltApi\Callers\AbstractCaller;
use GuzzleHttp\Exception\ConnectException;

/**
 * The underlying service created internally from a caller.
 */
class ApiCallService {
    /**
     * @var AbstractCaller
     */
    protected $caller;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $method = 'GET';

    public function __construct(AbstractCaller $caller) {
        $this->caller = $caller;
        $this->client = new Client();
    }

    public function execute() {
        try {
            $request = $this->client->request(
                $this->method,
                $this->caller->getFullUrl(true),
                [
                    'form_params' => [
                        $this->caller->getParams()
                    ],
                    'timeout' => 5,
                    'connect_timeout' => 5,
                ]
            );
        } catch (ConnectException $e) {
            throw new TimeOutException(
                'GameJolt API timed out.'
            );
        }

        $body = json_decode($request->getBody()->getContents(), true);

        return $body;
    }
}
