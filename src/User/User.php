<?php

namespace Ahsay\User;

use Ahsay\AbstractApi;

class User extends AbstractApi
{
    public function getUser($login): array
    {
        $data = [
            'LoginName' => $login
        ];

        return $this->getClient()->request('GetUser.do', $data, '2');
    }

    public function getUserStorageStat($login, $yearMonth, $backupSetId): array
    {
        $data = [
            'LoginName' => $login,
            'YearMonth' => $yearMonth,
            'BackupSetID' => $backupSetId
        ];

        return $this->getClient()->request('GetUserStorageStat.do', $data);
    }

    public function listUsers(): array
    {
        return $this->getClient()->request('ListUsers.do', [], '2');
    }
}
