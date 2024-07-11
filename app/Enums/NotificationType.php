<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The PaymentMethod enum.
 *
 * @method static self STRIPE()
 */
class NotificationType extends Enum
{

    const ERROR = 'error';
    const PURCHASE = 'purchase';
    const REGISTRATION = 'registration';
    const  INFO = 'info';

}
