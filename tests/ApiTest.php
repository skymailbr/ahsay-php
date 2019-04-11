<?php

namespace Ahsay\Test;

use Ahsay\Api;

class ApiTest extends AbstractTestCase
{
    public function testGetUserApi()
    {
        $api = new Api($this->getClient());

        $this->assertInstanceOf(Api\UserApi::class, $api->getUserApi());
    }

    public function testGetSystemApi()
    {
        $api = new Api($this->getClient());

        $this->assertInstanceOf(Api\SystemApi::class, $api->getSystemApi());
    }
}
