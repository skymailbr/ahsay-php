<?php

namespace Ahsay\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static PurchaseType TRIAL()
 * @method static PurchaseType PAID()
 */
class PurchaseType extends Enum
{
    private const TRIAL = 'TRIAL';
    private const PAID = 'PAID';
}
