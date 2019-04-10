<?php

namespace Ahsay\System;

use Ahsay\AbstractApi;

class GroupPolicy extends AbstractApi
{
    public function getPolicyGroups(string $login): array
    {
        $data = [
            'LoginName' => $login
        ];

        return $this->getClient()->request('ListPolicyGroups.do', $data, '2');
    }

    public function getUserGroups(): array
    {
        return $this->getClient()->request('ListUserGroups.do', []);
    }
}
