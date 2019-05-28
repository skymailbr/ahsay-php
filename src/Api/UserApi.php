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

    /**
     * @return User\BackupSet
     */
    public function backupSet()
    {
        if (!isset($this->instances['backup_set'])) {
            $this->instances['backup_set'] = new User\BackupSet($this->getClient());
        }

        return $this->instances['backup_set'];
    }

    /**
     * @return User\Report
     */
    public function report()
    {
        if (!isset($this->instances['report'])) {
            $this->instances['report'] = new User\Report($this->getClient());
        }

        return $this->instances['report'];
    }
}
