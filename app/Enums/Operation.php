<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static IN()
 * @method static static OUT()
 */
final class Operation extends Enum
{
    const IN = 0;
    const OUT = 1;
}