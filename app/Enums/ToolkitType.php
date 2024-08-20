<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The ButtonType enum.
 *
 * @method static self VIDEO()
 * @method static self IMAGE()
 * @method static self TEXT()
 */
class ToolkitType extends Enum
{
    const VIDEO = 'video';

    const IMAGE = 'image';

    const TEXT = 'text';

    public static function map(): array
    {
        return [
            self::VIDEO => 'Video',
            self::IMAGE => 'Image',
            self::TEXT => 'Text',
        ];
    }
}
