<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Database\Seeders;

use Misaf\VendraActivityLog\ActivityLogPlugin;
use Misaf\VendraActivityLog\Enums\ActivityLogPolicyEnum;
use Misaf\VendraSupport\Database\Seeders\PermissionPolicySeeder as BasePermissionPolicySeeder;
use Misaf\VendraTenant\Concerns\RequiresCurrentTenant;

final class PermissionPolicySeeder extends BasePermissionPolicySeeder
{
    use RequiresCurrentTenant;

    protected const string MODULE_NAME = ActivityLogPlugin::ID;

    public function run(): void
    {
        $tenant = $this->currentTenant();

        $this->seedPermissionPolicies($tenant->getKey());
    }

    /**
     * @return list<string>
     */
    protected function policies(): array
    {
        return array_column(ActivityLogPolicyEnum::cases(), 'value');
    }
}
