<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Misaf\VendraActivityLog\Enums\ActivityLogPolicyEnum;
use Misaf\VendraActivityLog\Models\ActivityLog;
use Misaf\VendraUser\Models\User;

final class ActivityLogPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->can(ActivityLogPolicyEnum::CREATE);
    }

    public function delete(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::DELETE);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(ActivityLogPolicyEnum::DELETE_ANY);
    }

    public function forceDelete(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::FORCE_DELETE);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can(ActivityLogPolicyEnum::FORCE_DELETE_ANY);
    }

    public function replicate(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::REPLICATE);
    }

    public function restore(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::RESTORE);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can(ActivityLogPolicyEnum::RESTORE_ANY);
    }

    public function update(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::UPDATE);
    }

    public function view(User $user, ActivityLog $activityLog): bool
    {
        return $user->can(ActivityLogPolicyEnum::VIEW);
    }

    public function viewAny(User $user): bool
    {
        return $user->can(ActivityLogPolicyEnum::VIEW_ANY);
    }
}
