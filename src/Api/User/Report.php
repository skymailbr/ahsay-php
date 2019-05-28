<?php

namespace Ahsay\Api\User;

use Ahsay\Api\AbstractApi;

class Report extends AbstractApi
{
    /**
     * @return array
     */
    public function getBackupJobReport(
        string $login,
        string $backupSetId,
        string $backupJobId,
        string $destinationId = null,
        string $owner = null,
        bool $cdp = null
    ): array {
        $data = [
            'LoginName' => $login,
            'BackupSetID' => $backupSetId,
            'BackupJobID' => $backupJobId,
        ];

        if (!is_null($destinationId)) {
            $data['DestionationID'] = $destinationId;
        }

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        if (!is_null($cdp)) {
            $data['Cdp'] = $cdp;
        }

        return $this->getClient()->request('GetBackupJobReport.do', $data);
    }
}
