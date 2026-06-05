<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Concerns;

use Spatie\Activitylog\LogOptions;

trait HasDefaultActivityLogOptions
{
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logExcept($this->activityLogExcept());
    }

    /**
     * @return list<string>
     */
    protected function activityLogExcept(): array
    {
        return ['id'];
    }
}
