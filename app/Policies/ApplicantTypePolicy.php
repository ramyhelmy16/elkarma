<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ApplicantType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicantTypePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ApplicantType');
    }

    public function view(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('View:ApplicantType');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ApplicantType');
    }

    public function update(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('Update:ApplicantType');
    }

    public function delete(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('Delete:ApplicantType');
    }

    public function restore(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('Restore:ApplicantType');
    }

    public function forceDelete(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('ForceDelete:ApplicantType');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ApplicantType');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ApplicantType');
    }

    public function replicate(AuthUser $authUser, ApplicantType $applicantType): bool
    {
        return $authUser->can('Replicate:ApplicantType');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ApplicantType');
    }

}