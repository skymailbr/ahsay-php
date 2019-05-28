<?php

namespace Ahsay\Test\Api;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\UserApi;
use Ahsay\Api\User\User;
use Ahsay\Api\User\BackupSet;
use Ahsay\Api\User\Report;

class UserApiTest extends AbstractTestCase
{
    public function testUser()
    {
        $api = new UserApi($this->getClient());

        $this->assertInstanceOf(User::class, $api->user());
    }

    public function testBackupSet()
    {
        $api = new UserApi($this->getClient());

        $this->assertInstanceOf(BackupSet::class, $api->backupSet());
    }

    public function testReport()
    {
        $api = new UserApi($this->getClient());

        $this->assertInstanceOf(Report::class, $api->report());
    }
}
