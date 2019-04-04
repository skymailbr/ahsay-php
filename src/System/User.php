<?php

namespace Ahsay\System;

use Ahsay\AbstractApi;

class User extends AbstractApi
{
    public function authSystemUser(string $user, string $password): array
    {
        $data = [
            'SysUser' => $user,
            'SysPwd' => $password
        ];

        return $this->getClient()->request('AuthSystemUser.do', $data);
    }
}
