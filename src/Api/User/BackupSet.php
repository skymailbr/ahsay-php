<?php

namespace Ahsay\Api\User;

use Ahsay\Api\AbstractApi;

class BackupSet extends AbstractApi
{
    /**
     * @return array
     */
    public function listBackupSets(string $login): array
    {
        $data = [
            'LoginName' => $login
        ];

        return $this->getClient()->request('ListBackupSets.do', $data);
    }

    /**
     * @return array
     */
    public function getBackupSet(string $login, string $backupSetId): array
    {
        $data = [
            'LoginName' => $login,
            'BackupSetID' => $backupSetId
        ];

        return $this->getClient()->request('GetBackupSet.do', $data);
    }

    /**
     * @return array
     */
    public function getBackupJobProgress(
        string $login,
        string $backupSetId,
        string $destinationId,
        string $backupJobId
    ): array {
        $data = [
            'LoginName' => $login,
            'BackupSetID' => $backupSetId,
            'DestionationID' => $destinationId,
            'BackupJobID' => $backupJobId,
        ];

        return $this->getClient()->request('GetBackupJobProgress.do', $data);
    }
}
