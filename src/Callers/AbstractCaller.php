<?php

namespace Harrk\GameJoltApi\Callers;

use Harrk\GameJoltApi\ApiCallService;
use Harrk\GameJoltApi\GamejoltConfig;

class AbstractCaller {
    protected string $uri;
    protected array $params;
    protected GamejoltConfig $gameJoltConfig;


    public function __construct(GamejoltConfig $gamejoltConfig)
    {
        $this->gameJoltConfig = $gamejoltConfig;
    }

    protected function getSignature(string $url, array $params = []): string
    {
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

    public function getFullUrl(bool $withSignature = false)
    {
        $url = $this->gameJoltConfig->getEndpoint() . $this->uri . '/';

        $url .= '?' . http_build_query($this->getParams());

        if ($withSignature) {
            $url .= '&signature=' . $this->getSignature($url);
        }

        return $url;
    }

    public function call(string $uri, array $params = []): array
    {
        $this->uri = $uri;
        $this->params = array_merge([
            'game_id' => $this->gameJoltConfig->getGameId()
        ], $params);

        return (new ApiCallService($this))->execute();
    }

    public function getParams(): array
    {
        return array_filter($this->params, static fn ($param) => ! empty($param));
    }
}
