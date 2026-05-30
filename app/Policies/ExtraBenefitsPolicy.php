<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ExtraBenefits;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtraBenefitsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ExtraBenefits');
    }

    public function view(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('View:ExtraBenefits');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ExtraBenefits');
    }

    public function update(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('Update:ExtraBenefits');
    }

    public function delete(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('Delete:ExtraBenefits');
    }

    public function restore(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('Restore:ExtraBenefits');
    }

    public function forceDelete(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('ForceDelete:ExtraBenefits');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ExtraBenefits');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ExtraBenefits');
    }

    public function replicate(AuthUser $authUser, ExtraBenefits $extraBenefits): bool
    {
        return $authUser->can('Replicate:ExtraBenefits');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ExtraBenefits');
    }

}