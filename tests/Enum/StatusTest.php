<?php

namespace Ahsay\Test\Enum;

use Ahsay\Enum\Status;
use Ahsay\Test\AbstractTestCase;

class StatusTest extends AbstractTestCase
{
    public function testEnable()
    {
        $enum = Status::ENABLE();

        $this->assertEquals('ENABLE', $enum->getValue());
    }

    public function testSuspended()
    {
        $enum = Status::SUSPENDED();

        $this->assertEquals('SUSPENDED', $enum->getValue());
    }
}
