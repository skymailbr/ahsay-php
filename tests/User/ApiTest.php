<?php

namespace Ahsay\Test\User;

use Ahsay\User\Api;
use Ahsay\Test\AbstractTestCase;

class ApiTest extends AbstractTestCase
{
    public function testUser()
    {
        $api = new Api($this->getClient());

        $this->assertInstanceOf(\Ahsay\User\User::class, $api->user());
    }
}
