<?php

namespace Ahsay;

use Ahsay\Api\AbstractApi;
use Ahsay\Api\SystemApi;
use Ahsay\Api\UserApi;

class Api extends AbstractApi
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return UserApi
     */
    public function getUserApi()
    {
        if (!isset($this->instances['user'])) {
            $this->instances['user'] = new UserApi($this->getClient());
        }

        return $this->instances['user'];
    }

    /**
     * @return SystemApi
     */
    public function getSystemApi()
    {
        if (!isset($this->instances['system'])) {
            $this->instances['system'] = new SystemApi($this->getClient());
        }

        return $this->instances['system'];
    }
}
