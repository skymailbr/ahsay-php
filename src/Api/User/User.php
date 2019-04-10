<?php

namespace Ahsay\Api\User;

use Ahsay\Api\AbstractApi;
use Ahsay\Enum\Status;

class User extends AbstractApi
{
    /**
     * @return array
     */
    public function listUsers(): array
    {
        return $this->getClient()->request('ListUsers.do', [], '2');
    }

    /**
     * @param string $login
     * @param string $yearMonth
     * @param string $backupSetId
     * @return array
     */
    public function getUserStorageStat(string $login, string $yearMonth, string $backupSetId): array
    {
        $data = [
            'LoginName' => $login,
            'YearMonth' => $yearMonth,
            'BackupSetID' => $backupSetId
        ];

        return $this->getClient()->request('GetUserStorageStat.do', $data);
    }

    /**
     * @param string $login
     * @return array
     */
    public function getUser(string $login): array
    {
        $data = [
            'LoginName' => $login
        ];

        return $this->getClient()->request('GetUser.do', $data, '2');
    }

    /**
     * @param string $login
     * @param Status $status
     * @return array
     */
    public function modifyUserStatus(string $login, Status $status): array
    {
        $data = [
            'LoginName' => $login,
            'Status' => $status->getValue(),
        ];

        return $this->getClient()->request('ModifyUserStatus.do', $data);
    }
}
