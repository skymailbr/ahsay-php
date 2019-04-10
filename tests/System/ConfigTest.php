<?php

namespace Ahsay\Test\System;

use Ahsay\System\Config;
use Ahsay\Test\AbstractTestCase;

class ConfigTest extends AbstractTestCase
{
    public function testGetLicense()
    {
        $api = new Config($this->getMockedClient());
        $response = $api->getLicense();

        $this->assertIsArray($response);
    }

    public function testGetReplicationMode()
    {
        $api = new Config($this->getMockedClient());
        $response = $api->getReplicationMode();

        $this->assertIsArray($response);
    }

    public function testGetSystemSetting()
    {
        $api = new Config($this->getMockedClient());
        $response = $api->getSystemSetting();

        $this->assertIsArray($response);
    }
}
