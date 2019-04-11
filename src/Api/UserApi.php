<?php

namespace Ahsay\Api;

class UserApi extends AbstractApi
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return User\User
     */
    public function user()
    {
        if (!isset($this->instances['user'])) {
            $this->instances['user'] = new User\User($this->getClient());
        }

        return $this->instances['user'];
    }
}
