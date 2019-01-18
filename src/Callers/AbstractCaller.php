<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\ApiCallService;
use Harrk\GameJoltApi\GamejoltConfig;

class AbstractCaller {

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var GamejoltConfig
     */
    protected $gameJoltConfig;


    public function __construct(GamejoltConfig $gamejoltConfig) {
        $this->gameJoltConfig = $gamejoltConfig;
    }

    protected function getSignature(string $url, array $params = []) {
        $urlWithPrivateKey = $url . $this->gameJoltConfig->getPrivateKey();
        $toHashString = $urlWithPrivateKey;

        if (count($params) > 0) {
            ksort($params);
            $toImplodeArray = [];

            foreach ($params as $key => $value) {
                $toImplodeArray[] = $key;
                $toImplodeArray[] = $value;
            }

            $toHashString = implode('', $toImplodeArray);
        }

        return sha1($toHashString);
    }

    public function getFullUrl($withSignature = false) {
        $url = $this->gameJoltConfig->getEndpoint() . $this->uri . '/';

        $url .= '?' . http_build_query($this->getParams());

        if ($withSignature) {
            $url .= '&signature=' . $this->getSignature($url);
        }

        return $url;
    }

    public function call($uri, $params = []) {
        $this->uri = $uri;
        $this->params = array_merge(
            [
                'game_id' => $this->gameJoltConfig->getGameId()
            ],
            $params
        );

        $apiCallService = new ApiCallService($this);

        return $apiCallService->execute();
    }

    public function getParams() {
        return array_filter((array) $this->params, function ($param) {
            return ! empty($param);
        });
    }
}
