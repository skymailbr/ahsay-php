<?php

namespace Ahsay\Test\Api\System;

use Ahsay\Api\System\GroupPolicy;
use Ahsay\Test\AbstractTestCase;

class GroupPolicyTest extends AbstractTestCase
{
    public function testGetPolicyGroups()
    {
        $api = new GroupPolicy($this->getMockedClient());
        $response = $api->getPolicyGroups('login');

        $this->assertIsArray($response);
    }

    public function testGetUserGroups()
    {
        $api = new GroupPolicy($this->getMockedClient());
        $response = $api->getUserGroups();

        $this->assertIsArray($response);
    }
}
