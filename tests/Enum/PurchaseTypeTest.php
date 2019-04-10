<?php

namespace Ahsay\Test\Enum;

use Ahsay\Enum\PurchaseType;
use Ahsay\Test\AbstractTestCase;

class PurchaseTypeTest extends AbstractTestCase
{
    public function testPaid()
    {
        $enum = PurchaseType::PAID();

        $this->assertEquals('PAID', $enum->getValue());
    }

    public function testTrial()
    {
        $enum = PurchaseType::TRIAL();

        $this->assertEquals('TRIAL', $enum->getValue());
    }
}
