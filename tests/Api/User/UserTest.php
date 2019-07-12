<?php

namespace Ahsay\Test\Api\User;

use Ahsay\Enum\Status;
use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\User\User;

class UserTest extends AbstractTestCase
{
    public function testAddUser()
    {
        $api = new User($this->getMockedClient());
        $api->addUser('user', 'c4n26472', 'email@domain.com', 107374182400);
    }

    public function testAddUserWithDefinedQuota()
    {
        $api = new User($this->getMockedClient());
        $api->addUser('user', 'c4n26472', 'email@domain.com', 107374182400, ['QuotaList' => [['Enabled' => false, 'DestinationKey' => 'OBS', 'Quota' => '1']]]);
    }

    public function testUpdateUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->updateUser('user', []);

        $this->assertIsArray($response);
    }

    public function testGetUserStorageStat()
    {
        $api = new User($this->getMockedClient());
        $response = $api->getUserStorageStat('user', '2019-03', 'all', '0wner');

        $this->assertIsArray($response);
    }

    public function testGetUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->getUser('user', '0wner');

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
        $response = $api->modifyUserStatus('login', Status::SUSPENDED(), '0wner');

        $this->assertIsArray($response);
    }

    public function testRemoveUser()
    {
        $api = new User($this->getMockedClient());
        $response = $api->removeUser('login', '0wner');

        $this->assertIsArray($response);
    }

    public function testAddContact()
    {
        $api = new User($this->getMockedClient());
        $response = $api->addContact('login', 'Contact Name', 'new.email@contact.com', '0wner');

        $this->assertIsArray($response);
    }
}
