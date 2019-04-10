<?php

namespace Ahsay\Test;

use Ahsay\Client;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

class AbstractTestCase extends TestCase
{
    use PHPMock;

    protected function getClient()
    {
        return $client = new Client('user', 'pwd', 'https://backup-domain.com');
    }

    protected function getMockedClient()
    {
        $client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['request'])
            ->getMock();
        $client->expects($this->once())
            ->method('request')
            ->withAnyParameters()
            ->willReturn(['Status' => 'OK', 'Data' => []]);

        return $client;
    }
}
