<?php

namespace Ahsay\Test\Enum;

use Ahsay\Enum\ClientType;
use Ahsay\Test\AbstractTestCase;

class ClientTypeTest extends AbstractTestCase
{
    public function testAcb()
    {
        $enum = ClientType::ACB();

        $this->assertEquals('ACB', $enum->getValue());
    }

    public function testObm()
    {
        $enum = ClientType::OBM();

        $this->assertEquals('OBM', $enum->getValue());
    }
}
