<?php

namespace Ahsay\Test\Api\User;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\User\Report;

class ReportTest extends AbstractTestCase
{
    public function testGetBackupJobReport()
    {
        $api = new Report($this->getMockedClient());
        $response = $api->getBackupJobReport(
            'username',
            '1551985287886',
            '2019-03-07-16-25-56',
            '1551985385178',
            'reseller',
            true
        );

        $this->assertIsArray($response);
    }

    public function testGetBackupJobReportSummary()
    {
        $api = new Report($this->getMockedClient());
        $response = $api->getBackupJobReportSummary(
            'username',
            '1551985287886',
            '2019-03-07-16-25-56',
            '1551985385178',
            'reseller',
            true
        );

        $this->assertIsArray($response);
    }
}
