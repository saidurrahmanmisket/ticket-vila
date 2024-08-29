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

    const DRAFT = 'draft';

    const INACTIVE = 'inactive';

    const PUBLISHED = 'published';

    const COMPLETED = 'completed';

    const PROCESSING = 'processing';

    const PENDING = 'pending';
    const APPROVED = 'approved';

    const REFUND = 'refund';

    const RESOLVED = 'resolved';

    const REJECTED = 'rejected';

    public static function campaignStatus(): array
    {
        return [
            self::DRAFT => 'Draft',
            self::COMPLETED => 'Completed',
            self::PUBLISHED => 'Published',

        ];
    }

    public static function chatStatus(): array
    {
        return [
            self::PENDING => 'Pending',
            self::RESOLVED => 'Resolved',
            self::REJECTED => 'Rejected',
        ];
    }
}
