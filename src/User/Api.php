<?php

namespace Ahsay\User;

use Ahsay\AbstractApi;

class Api extends AbstractApi
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
