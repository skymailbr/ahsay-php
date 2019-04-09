<?php

namespace Ahsay\Test\System;

use Ahsay\Test\AbstractTestCase;
use Ahsay\System\Api;
use Ahsay\System\User;

class ApiTest extends AbstractTestCase
{
    public function testUser()
    {
        $api = new Api($this->getClient());

        $this->assertInstanceOf(User::class, $api->user());
    }
}
