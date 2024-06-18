<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The PaymentMethod enum.
 *
 * @method static self STRIPE()
 */
class PaymentMethod extends Enum
{
    const STRIPE = 'stripe';

    const PAYPAL = 'paypal';
}
