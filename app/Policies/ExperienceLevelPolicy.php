<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ExperienceLevel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExperienceLevelPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ExperienceLevel');
    }

    public function view(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('View:ExperienceLevel');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ExperienceLevel');
    }

    public function update(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('Update:ExperienceLevel');
    }

    public function delete(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('Delete:ExperienceLevel');
    }

    public function restore(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('Restore:ExperienceLevel');
    }

    public function forceDelete(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('ForceDelete:ExperienceLevel');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ExperienceLevel');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ExperienceLevel');
    }

    public function replicate(AuthUser $authUser, ExperienceLevel $experienceLevel): bool
    {
        return $authUser->can('Replicate:ExperienceLevel');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ExperienceLevel');
    }

}