<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Models;

use Misaf\VendraTenant\Traits\BelongsToTenant;
use Spatie\Activitylog\Models\Activity as SpatieActivityLog;

/**
 * Misaf\VendraActivitylog\Models\ActivityLog.
 *
 * @property int $tenant_id
 */
final class ActivityLog extends SpatieActivityLog
{
    use BelongsToTenant;

    protected $hidden = [
        'tenant_id',
    ];

    protected function casts(): array
    {
        return [
            'tenant_id' => 'integer',
            ...parent::casts(),
        ];
    }
}
