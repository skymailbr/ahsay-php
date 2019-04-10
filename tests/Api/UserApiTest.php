<?php

namespace Ahsay\Test\Api;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\UserApi;
use Ahsay\Api\User\User;

class UserApiTest extends AbstractTestCase
{
    public function testUser()
    {
        $api = new UserApi($this->getClient());

        $this->assertInstanceOf(User::class, $api->user());
    }
}
