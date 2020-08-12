<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserAppKeysType extends Enum
{
    const ADMIN =   0;
    const READWRITE =   1;
    const READ = 2;
}
