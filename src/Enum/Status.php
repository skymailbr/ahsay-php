<?php

namespace Ahsay\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Status ENABLE()
 * @method static Status SUSPENDED()
 */
class Status extends Enum
{
    private const ENABLE = 'ENABLE';
    private const SUSPENDED = 'SUSPENDED';
}
