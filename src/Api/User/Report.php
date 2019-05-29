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
        string $destinationId,
        string $owner = null,
        bool $cdp = null
    ): array {
        $data = [
            'LoginName' => $login,
            'BackupSetID' => $backupSetId,
            'BackupJobID' => $backupJobId,
            'DestinationID' => $destinationId,
        ];

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        if (!is_null($cdp)) {
            $data['Cdp'] = $cdp;
        }

        return $this->getClient()->request('GetBackupJobReport.do', $data);
    }

    /**
     * @return array
     */
    public function getBackupJobReportSummary(
        string $login,
        string $backupSetId,
        string $backupJobId,
        string $destinationId,
        string $owner = null,
        bool $cdp = null
    ): array {
        $data = [
            'LoginName' => $login,
            'BackupSetID' => $backupSetId,
            'BackupJobID' => $backupJobId,
            'DestinationID' => $destinationId,
        ];

        if (!is_null($owner)) {
            $data['Owner'] = $owner;
        }

        if (!is_null($cdp)) {
            $data['Cdp'] = $cdp;
        }

        return $this->getClient()->request('GetBackupJobReportSummary.do', $data);
    }
}
