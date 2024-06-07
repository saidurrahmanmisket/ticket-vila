<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The ButtonType enum.
 *
 * @method static self BUY_NOW()
 * @method static self LEARN_MORE()
 * @method static self NONE()
 */
class ButtonType extends Enum
{
    const BUY_NOW = 'buy_now';
    const LEARN_MORE = 'learn_more';
    const BOTH = 'both';
    const NONE = 'none';

    public static function map(): array
    {
        return [
            self::BUY_NOW => 'Buy Now',
            self::LEARN_MORE => 'Learn More',
            self::BOTH => 'Both',
            self::NONE => 'None',
        ];
    }
}
