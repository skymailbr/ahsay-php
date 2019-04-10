<?php

namespace Ahsay\Test\Enum;

use Ahsay\Enum\Language;
use Ahsay\Test\AbstractTestCase;

class LanguageTest extends AbstractTestCase
{
    public function testEnglish()
    {
        $enum = Language::ENGLISH();

        $this->assertEquals('en', $enum->getValue());
    }

    public function testPortugueseBrazil()
    {
        $enum = Language::PORTUGUESE_BRAZIL();

        $this->assertEquals('pt_BR', $enum->getValue());
    }
}
