<?php

namespace Ahsay\Test\Api\User;

use Ahsay\Enum\Status;
use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\User\User;

class UserTest extends AbstractTestCase
{
    public function testGetUserStorageStat()
    {
        $api = new User($this->getMockedClient());
        $response = $api->getUserStorageStat('user', '2019-03', 'all');

        $this->assertIsArray($response);
    }

    public function testGetUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->getUser('user');

        $this->assertIsArray($response);
    }

    public function testListUsers()
    {
        $api = new User($this->getMockedClient());
        $response = $api->listUsers();

        $this->assertIsArray($response);
    }

    public function testModifyUserStatus()
    {
        $api = new User($this->getMockedClient());
        $response = $api->modifyUserStatus('login', Status::SUSPENDED());

        $this->assertIsArray($response);
    }
}
