<?php

namespace Ahsay\Test\System;

use Ahsay\System\User;
use Ahsay\Test\AbstractTestCase;

class UserTest extends AbstractTestCase
{
    public function testAddSystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->addSystemUser('system_user', 'password');

        $this->assertIsArray($response);
    }

    public function testAddReadOnlySystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->addReadOnlySystemUser('system_user', 'password');

        $this->assertIsArray($response);
    }

    public function testAddApiOnlySystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->addApiOnlySystemUser('system_user', 'password');

        $this->assertIsArray($response);
    }

    public function testAddReseller()
    {
        $api = new User($this->getMockedClient());
        $response = $api->addReseller('system_user', 'password', 'mybackupservice.com', '0.0.0.0:443');

        $this->assertIsArray($response);
    }

    public function testUpdateSystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->updateSystemUser('system_user', 'new_password');

        $this->assertIsArray($response);
    }

    public function testRemoveSystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->removeSystemUser('system_user');

        $this->assertIsArray($response);
    }

    public function testAuthSystemUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->authSystemUser('system_user', 'secret_password');

        $this->assertIsArray($response);
    }

    public function testListSystemUsers()
    {
        $api = new User($this->getMockedClient());
        $response = $api->listSystemUsers();

        $this->assertIsArray($response);
    }
}
