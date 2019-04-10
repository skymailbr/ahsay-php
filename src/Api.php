<?php

namespace Ahsay;

use Ahsay\Api\AbstractApi;
use Ahsay\Api\UserApi as UserApi;

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
}
