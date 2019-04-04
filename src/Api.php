<?php

namespace Ahsay;

use Ahsay\User\Api as UserApi;

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
        if (isset($this->instances['user'])) {
            return $this->instances['user'];
        }

        $this->instances['user'] = new UserApi($this->getClient());
    }
}
