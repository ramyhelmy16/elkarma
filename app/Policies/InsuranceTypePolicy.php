<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\InsuranceType;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsuranceTypePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:InsuranceType');
    }

    public function view(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('View:InsuranceType');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:InsuranceType');
    }

    public function update(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('Update:InsuranceType');
    }

    public function delete(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('Delete:InsuranceType');
    }

    public function restore(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('Restore:InsuranceType');
    }

    public function forceDelete(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('ForceDelete:InsuranceType');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:InsuranceType');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:InsuranceType');
    }

    public function replicate(AuthUser $authUser, InsuranceType $insuranceType): bool
    {
        return $authUser->can('Replicate:InsuranceType');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:InsuranceType');
    }

}