<?php

namespace Ahsay\Test\Enum;

use Ahsay\Test\AbstractTestCase;
use Ahsay\Enum\StorageUnit;
use Ahsay\Helper\Storage;

class StorageTest extends \PHPUnit\Framework\TestCase
{
    public function testToBytesThrowExceptionOnInvalidStorageUnit()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('Value \'1\' is not part of the enum Ahsay\\Enum\StorageUnit');

        $result = Storage::toBytes(100, new StorageUnit(1));
    }

    public function testGigabyteToByte()
    {
        $result = Storage::toBytes(100, StorageUnit::GIGABYTE());

        $this->assertEquals(107374182400, $result);
    }

    public function testByteToGigabyte()
    {
        $result = Storage::fromBytes(107374182400);

        $this->assertEquals([
            'amount' => 100,
            'unit' => StorageUnit::GIGABYTE(),
            'formatted' => '100 GB',
        ], $result);
    }
}
