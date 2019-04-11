<?php

namespace Ahsay\Api;

class SystemApi extends AbstractApi
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return Config
     */
    public function config()
    {
        if (!isset($this->instances['config'])) {
            $this->instances['config'] = new System\Config($this->getClient());
        }

        return $this->instances['config'];
    }

    /**
     * @return GroupPolicy
     */
    public function groupPolicy()
    {
        if (!isset($this->instances['groupPolicy'])) {
            $this->instances['groupPolicy'] = new System\GroupPolicy($this->getClient());
        }

        return $this->instances['groupPolicy'];
    }

    /**
     * @return User
     */
    public function user()
    {
        if (!isset($this->instances['user'])) {
            $this->instances['user'] = new System\User($this->getClient());
        }

        return $this->instances['user'];
    }
}
