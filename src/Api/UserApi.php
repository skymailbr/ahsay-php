<?php

namespace Ahsay\Api;

use Ahsay\Api\AbstractApi;
use Ahsay\Api\User\User;

class UserApi extends AbstractApi
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return User
     */
    public function user()
    {
        if (!isset($this->instances['user'])) {
            $this->instances['user'] = new User($this->getClient());
        }

        return $this->instances['user'];
    }
}
