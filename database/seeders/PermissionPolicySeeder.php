<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Misaf\VendraActivityLog\Enums\ActivityLogPolicyEnum;
use Misaf\VendraTenant\Models\Tenant;
use RuntimeException;
use Spatie\Permission\PermissionRegistrar;

final class PermissionPolicySeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::current();

        if ( ! $tenant) {
            throw new RuntimeException('Activity log permission policy seeding requires a current tenant.');
        }

        $this->seedPermissionPolicies($tenant);
    }

    private function seedPermissionPolicies(Tenant $tenant): void
    {
        /** @var class-string<Model> $permissionModel */
        $permissionModel = Config::string('permission.models.permission');

        $guardName = Config::string('auth.defaults.guard');

        $policies = $this->policies();

        foreach ($policies as $policy) {
            $permissionModel::query()->firstOrCreate([
                'tenant_id'  => $tenant->getKey(),
                'name'       => $policy,
                'guard_name' => $guardName,
            ]);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    /**
     * @return list<string>
     */
    private function policies(): array
    {
        return array_map(
            static fn(ActivityLogPolicyEnum $policy): string => $policy->value,
            ActivityLogPolicyEnum::cases(),
        );
    }
}
