<?php

namespace Ahsay\Test;

use Ahsay\Api;

class ApiTest extends AbstractTestCase
{
    public function testGetUserApi()
    {
        $api = new Api($this->getClient());

        $this->assertInstanceOf(\Ahsay\User\Api::class, $api->getUserApi());
    }
}
