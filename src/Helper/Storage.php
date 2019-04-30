<?php

namespace Ahsay\Helper;

use Ahsay\Enum\StorageUnit;

final class Storage
{
    public static function toBytes(float $amount, StorageUnit $unit): ?int
    {
        if (FALSE === $exponent = array_search($unit, array_values(StorageUnit::values()))) {
            throw new \Exception('Invalid storage unit');
        }

        return $amount * (1024 ** $exponent);
    }

    public static function fromBytes(float $bytes, int $precision = 2): array
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return [
            'amount' => round($bytes, $precision),
            'unit' => array_values(StorageUnit::values())[$pow],
            'formatted' => round($bytes, $precision) . ' ' . (string) array_values(StorageUnit::values())[$pow],
        ];
    }
}
