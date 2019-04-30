<?php

namespace Ahsay\Api\User;

use Ahsay\Api\AbstractApi;
use Ahsay\Enum\Status;

class User extends AbstractApi
{
    /**
     * @param string $login Client user name
     * @param string $password Client password
     * @param string $email Contact Email
     * @param integer $quotaInBytes Unit in bytes
     * @param array $data Additional data
     * @return array
     * @throws \Exception
     */
    public function addUser(string $login, string $password, string $email, int $quotaInBytes, array $data = []): array
    {
        $defaultQuota = [
            'Enabled' => true,
            'DestinationKey' => 'OBS',
            'Quota' => $quotaInBytes
        ];

        if (isset($data['QuotaList']) && is_array($data['QuotaList'])) {
            foreach ($data['QuotaList'] as $k => $quota) {
                if (isset($quota['DestinationKey']) && $quota['DestinationKey'] === 'OBS') {
                    $data['QuotaList'][$k] = array_merge($quota, $defaultQuota);
                }
            }
        } else {
            $data['QuotaList'] = [$defaultQuota];
        }

        $data = array_merge_recursive($data, [
            'LoginName' => $login,
            'Password' => $password,
            'Email' => $email,
        ]);

        return $this->getClient()->request('AddUser.do', $data, '2');
    }

    /**
     * @param string $login
     * @param array $data
     * @return array
     */
    public function updateUser(string $login, array $data): array
    {
        $data = array_merge($data, [
            'LoginName' => $login
        ]);

        return $this->getClient()->request('UpdateUser.do', $data, '2');
    }

    /**
     * @return array
     */
    public function listUsers(array $filters = []): array
    {
        return $this->getClient()->request('ListUsers.do', $filters, '2');
    }

    /**
     * @param string $login
     * @param string $yearMonth
     * @param string $backupSetId
     * @return array
     */
    public function getUserStorageStat(
        string $login,
        string $yearMonth,
        string $backupSetId,
        string $owner = null
    ): array {
        $data = [
            'LoginName' => $login,
            'YearMonth' => $yearMonth,
            'BackupSetID' => $backupSetId
        ];

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        return $this->getClient()->request('GetUserStorageStat.do', $data);
    }

    /**
     * @param string $login
     * @return array
     */
    public function getUser(string $login, string $owner = null): array
    {
        $data = [
            'LoginName' => $login
        ];

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        return $this->getClient()->request('GetUser.do', $data, '2');
    }

    /**
     * @param string $login
     * @param Status $status
     * @return array
     */
    public function modifyUserStatus(string $login, Status $status, string $owner = null): array
    {
        $data = [
            'LoginName' => $login,
            'Status' => $status->getValue(),
        ];

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        return $this->getClient()->request('ModifyUserStatus.do', $data);
    }
}
