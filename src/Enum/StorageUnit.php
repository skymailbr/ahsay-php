<?php

namespace Ahsay\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static StorageUnit BYTE()
 * @method static StorageUnit KILOBYTE()
 * @method static StorageUnit MEGABYTE()
 * @method static StorageUnit GIGABYTE()
 * @method static StorageUnit TERABYTE()
 * @method static StorageUnit PETABYTE()
 * @method static StorageUnit EXABYTE()
 * @method static StorageUnit ZETTABYTE()
 * @method static StorageUnit YOTTABYTE()
 */
class StorageUnit extends Enum
{
    private const BYTE = 'B';
    private const KYLOBYTE = 'KB';
    private const MEGABYTE = 'MB';
    private const GIGABYTE = 'GB';
    private const TERABYTE = 'TB';
    private const PETABYTE = 'PB';
    private const EXABYTE = 'EB';
    private const ZETTABYTE = 'ZB';
    private const YOTTABYTE = 'YB';
}
