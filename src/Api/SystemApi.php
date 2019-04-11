<?php

namespace Ahsay\Api;

class SystemApi extends AbstractApi
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return System\Config
     */
    public function config()
    {
        if (!isset($this->instances['config'])) {
            $this->instances['config'] = new System\Config($this->getClient());
        }

        return $this->instances['config'];
    }

    /**
     * @return System\GroupPolicy
     */
    public function groupPolicy()
    {
        if (!isset($this->instances['groupPolicy'])) {
            $this->instances['groupPolicy'] = new System\GroupPolicy($this->getClient());
        }

        return $this->instances['groupPolicy'];
    }

    /**
     * @return System\User
     */
    public function user()
    {
        if (!isset($this->instances['user'])) {
            $this->instances['user'] = new System\User($this->getClient());
        }

        return $this->instances['user'];
    }
}
