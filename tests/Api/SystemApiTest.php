<?php

namespace Ahsay\Test\Api;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Api\SystemApi;
use Ahsay\Api\System\User;

class SystemApiTest extends AbstractTestCase
{
    public function testUser()
    {
        $api = new SystemApi($this->getClient());

        $this->assertInstanceOf(User::class, $api->user());
    }
}
