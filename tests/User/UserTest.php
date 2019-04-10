<?php

namespace Ahsay\Test\User;

use Ahsay\Test\AbstractTestCase;
use Ahsay\User\User;

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
}
