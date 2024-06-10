<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Lang enum.
 *
 * @method static self ENGLISH()
 * @method static self GERMAN()
 * @method static self HUNGARIAN()
 */
class Lang extends Enum
{
    const ENGLISH = 'en';
    const GERMAN = 'de';
    const HUNGARIAN = 'hu';


    public static function map(): array
    {
        return [
            self::ENGLISH => 'English',
            self::GERMAN => 'German',
            self::HUNGARIAN => 'Hungarian',
        ];
    }

    public static function values(): array{
        return [
            self::ENGLISH,
            self::GERMAN,
            self::HUNGARIAN,
        ];
    }
}
