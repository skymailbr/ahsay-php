<?php

namespace Ahsay\System;

use Ahsay\AbstractApi;

class User extends AbstractApi
{
    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function addSystemUser(string $login, string $password): array
    {
        $data = [
            'LoginName' => $login,
            'Password' => $password,
            'Role' => 'ADMIN',
        ];

        return $this->getClient()->request('AddSysUser.do', $data);
    }

    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function addReadOnlySystemUser(string $login, string $password): array
    {
        $data = [
            'LoginName' => $login,
            'Password' => $password,
            'Role' => 'READ_ONLY_ADMIN',
        ];

        return $this->getClient()->request('AddSysUser.do', $data);
    }

    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function addApiOnlySystemUser(string $login, string $password): array
    {
        $data = [
            'LoginName' => $login,
            'Password' => $password,
            'Role' => 'API_ONLY',
        ];

        return $this->getClient()->request('AddSysUser.do', $data);
    }

    /**
     * @param string $login
     * @param string $password
     * @param string $hostname
     * @param string $ip
     * @return array
     */
    public function addReseller(string $login, string $password, string $hostname, string $ip): array
    {
        $data = [
            'LoginName' => $login,
            'Password' => $password,
            'Role' => 'RESELLER',
            'Hostname' => $hostname,
            'IP' => $ip
        ];

        return $this->getClient()->request('AddSysUser.do', $data);
    }

    /**
     * @param string $login
     * @param string $newPassword
     * @return array
     */
    public function updateSystemUser(string $login, string $newPassword): array
    {
        $data = [
            'LoginName' => $login,
            'Password' => $newPassword
        ];

        return $this->getClient()->request('RemoveSysUser.do', $data);
    }

    /**
     * @param string $login
     * @return array
     */
    public function removeSystemUser(string $login): array
    {
        $data = [
            'LoginName' => $login
        ];

        return $this->getClient()->request('RemoveSysUser.do', $data);
    }

    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function authSystemUser(string $login, string $password): array
    {
        $data = [
            'SysUser' => $login,
            'SysPwd' => $password
        ];

        return $this->getClient()->request('AuthSystemUser.do', $data);
    }

    /**
     * @return array
     */
    public function listSystemUsers(): array
    {
        return $this->getClient()->request('ListSystemUsers.do');
    }
}
