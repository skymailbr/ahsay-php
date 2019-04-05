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
}
