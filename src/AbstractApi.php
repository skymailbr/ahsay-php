<?php

namespace Ahsay;

class AbstractApi
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    /**
     * @return Client
     */
    protected function getClient(): Client
    {
        return $this->client;
    }
}
