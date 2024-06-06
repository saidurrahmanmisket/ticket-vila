<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Status enum.
 *
 * @method static self ACTIVE()
 * @method static self INACTIVE()
 * @method static self PUBLISHED()
 */
class Status extends Enum
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const PUBLISHED = 'published';
}
