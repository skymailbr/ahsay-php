<?php

namespace Ahsay\Test\Api;

use Ahsay\Api\System\Config;
use Ahsay\Api\System\GroupPolicy;
use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\SystemApi;
use Ahsay\Api\System\User;

class SystemApiTest extends AbstractTestCase
{
    public function testConfig()
    {
        $api = new SystemApi($this->getClient());

        $this->assertInstanceOf(Config::class, $api->config());
    }

    public function testGroupPolicy()
    {
        $api = new SystemApi($this->getClient());

        $this->assertInstanceOf(GroupPolicy::class, $api->groupPolicy());
    }

    public function testUser()
    {
        $api = new SystemApi($this->getClient());

        $this->assertInstanceOf(User::class, $api->user());
    }
}
