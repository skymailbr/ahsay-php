<?php

namespace Ahsay\Test\Api\User;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\User\BackupSet;

class BackupSetTest extends AbstractTestCase
{
    public function testListBackupSets()
    {
        $api = new BackupSet($this->getMockedClient());
        $response = $api->listBackupSets('username');

        $this->assertIsArray($response);
    }

    public function testGetBackupSet()
    {
        $api = new BackupSet($this->getMockedClient());
        $response = $api->getBackupSet('username', '1551985287886');

        $this->assertIsArray($response);
    }

    public function testGetBackupJobProgress()
    {
        $api = new BackupSet($this->getMockedClient());
        $response = $api->getBackupJobProgress('username', '1551985287886', '1551985385178', '2019-03-07-16-25-56');

        $this->assertIsArray($response);
    }

    public function testListBackupJobs()
    {
        $api = new BackupSet($this->getMockedClient());
        $response = $api->listBackupJobs('username', false);

        $this->assertIsArray($response);
    }
}
