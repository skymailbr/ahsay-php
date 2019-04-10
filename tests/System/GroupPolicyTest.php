<?php

namespace Ahsay\Test\System;

use Ahsay\System\GroupPolicy;
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
