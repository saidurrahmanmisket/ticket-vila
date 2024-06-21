<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Page enum.
 *
 * @method static self ABOUT_US()
 * @method static self HOW_IT_WORKS()
 * @method static self THE_HOUSE()
 * @method static self CONTACT()
 * @method static self Raffle_Rules()
 */
class Page extends Enum
{
    const HOME = 'home';

    const ABOUT_US = 'about_us';

    const HOW_IT_WORKS = 'how_it_works';

    const THE_HOUSE = 'the_house';

    const CONTACT = 'contact';

    const Raffle_Rules = 'raffle_rules';

    public static function map(): array
    {
        return [
            self::HOME => 'Home Page',
            self::ABOUT_US => 'About Us',
            self::HOW_IT_WORKS => 'How It Works',
            self::THE_HOUSE => 'The House',
            self::CONTACT => 'Contact',
            self::Raffle_Rules => 'Raffle Rules',
        ];
    }
}
