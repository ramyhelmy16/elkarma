<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $tenants = '[]';
        $users = '[]';
        $userTenantPivot = '[]';
        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["ViewAny:ApplicantType","View:ApplicantType","Create:ApplicantType","Update:ApplicantType","Delete:ApplicantType","Restore:ApplicantType","ForceDelete:ApplicantType","ForceDeleteAny:ApplicantType","RestoreAny:ApplicantType","Replicate:ApplicantType","Reorder:ApplicantType","ViewAny:Applicant","View:Applicant","Create:Applicant","Update:Applicant","Delete:Applicant","Restore:Applicant","ForceDelete:Applicant","ForceDeleteAny:Applicant","RestoreAny:Applicant","Replicate:Applicant","Reorder:Applicant","ViewAny:Area","View:Area","Create:Area","Update:Area","Delete:Area","Restore:Area","ForceDelete:Area","ForceDeleteAny:Area","RestoreAny:Area","Replicate:Area","Reorder:Area","ViewAny:Company","View:Company","Create:Company","Update:Company","Delete:Company","Restore:Company","ForceDelete:Company","ForceDeleteAny:Company","RestoreAny:Company","Replicate:Company","Reorder:Company","ViewAny:EducationLevel","View:EducationLevel","Create:EducationLevel","Update:EducationLevel","Delete:EducationLevel","Restore:EducationLevel","ForceDelete:EducationLevel","ForceDeleteAny:EducationLevel","RestoreAny:EducationLevel","Replicate:EducationLevel","Reorder:EducationLevel","ViewAny:ExperienceLevel","View:ExperienceLevel","Create:ExperienceLevel","Update:ExperienceLevel","Delete:ExperienceLevel","Restore:ExperienceLevel","ForceDelete:ExperienceLevel","ForceDeleteAny:ExperienceLevel","RestoreAny:ExperienceLevel","Replicate:ExperienceLevel","Reorder:ExperienceLevel","ViewAny:ExtraBenefits","View:ExtraBenefits","Create:ExtraBenefits","Update:ExtraBenefits","Delete:ExtraBenefits","Restore:ExtraBenefits","ForceDelete:ExtraBenefits","ForceDeleteAny:ExtraBenefits","RestoreAny:ExtraBenefits","Replicate:ExtraBenefits","Reorder:ExtraBenefits","ViewAny:Gender","View:Gender","Create:Gender","Update:Gender","Delete:Gender","Restore:Gender","ForceDelete:Gender","ForceDeleteAny:Gender","RestoreAny:Gender","Replicate:Gender","Reorder:Gender","ViewAny:Governorate","View:Governorate","Create:Governorate","Update:Governorate","Delete:Governorate","Restore:Governorate","ForceDelete:Governorate","ForceDeleteAny:Governorate","RestoreAny:Governorate","Replicate:Governorate","Reorder:Governorate","ViewAny:InsuranceType","View:InsuranceType","Create:InsuranceType","Update:InsuranceType","Delete:InsuranceType","Restore:InsuranceType","ForceDelete:InsuranceType","ForceDeleteAny:InsuranceType","RestoreAny:InsuranceType","Replicate:InsuranceType","Reorder:InsuranceType","ViewAny:JobTitle","View:JobTitle","Create:JobTitle","Update:JobTitle","Delete:JobTitle","Restore:JobTitle","ForceDelete:JobTitle","ForceDeleteAny:JobTitle","RestoreAny:JobTitle","Replicate:JobTitle","Reorder:JobTitle","ViewAny:JobType","View:JobType","Create:JobType","Update:JobType","Delete:JobType","Restore:JobType","ForceDelete:JobType","ForceDeleteAny:JobType","RestoreAny:JobType","Replicate:JobType","Reorder:JobType","ViewAny:Occupation","View:Occupation","Create:Occupation","Update:Occupation","Delete:Occupation","Restore:Occupation","ForceDelete:Occupation","ForceDeleteAny:Occupation","RestoreAny:Occupation","Replicate:Occupation","Reorder:Occupation","ViewAny:Qualification","View:Qualification","Create:Qualification","Update:Qualification","Delete:Qualification","Restore:Qualification","ForceDelete:Qualification","ForceDeleteAny:Qualification","RestoreAny:Qualification","Replicate:Qualification","Reorder:Qualification","ViewAny:Role","View:Role","Create:Role","Update:Role","Delete:Role","Restore:Role","ForceDelete:Role","ForceDeleteAny:Role","RestoreAny:Role","Replicate:Role","Reorder:Role","ViewAny:Service","View:Service","Create:Service","Update:Service","Delete:Service","Restore:Service","ForceDelete:Service","ForceDeleteAny:Service","RestoreAny:Service","Replicate:Service","Reorder:Service","ViewAny:User","View:User","Create:User","Update:User","Delete:User","Restore:User","ForceDelete:User","ForceDeleteAny:User","RestoreAny:User","Replicate:User","Reorder:User","ViewAny:WorkExperience","View:WorkExperience","Create:WorkExperience","Update:WorkExperience","Delete:WorkExperience","Restore:WorkExperience","ForceDelete:WorkExperience","ForceDeleteAny:WorkExperience","RestoreAny:WorkExperience","Replicate:WorkExperience","Reorder:WorkExperience","View:JobMatching","View:MainStat"]}]';
        $directPermissions = '[]';

        // 1. Seed tenants first (if present)
        if (! blank($tenants) && $tenants !== '[]') {
            static::seedTenants($tenants);
        }

        // 2. Seed roles with permissions
        static::makeRolesWithPermissions($rolesWithPermissions);

        // 3. Seed direct permissions
        static::makeDirectPermissions($directPermissions);

        // 4. Seed users with their roles/permissions (if present)
        if (! blank($users) && $users !== '[]') {
            static::seedUsers($users);
        }

        // 5. Seed user-tenant pivot (if present)
        if (! blank($userTenantPivot) && $userTenantPivot !== '[]') {
            static::seedUserTenantPivot($userTenantPivot);
        }

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function seedTenants(string $tenants): void
    {
        if (blank($tenantData = json_decode($tenants, true))) {
            return;
        }

        $tenantModel = '';
        if (blank($tenantModel)) {
            return;
        }

        foreach ($tenantData as $tenant) {
            $tenantModel::firstOrCreate(
                ['id' => $tenant['id']],
                $tenant
            );
        }
    }

    protected static function seedUsers(string $users): void
    {
        if (blank($userData = json_decode($users, true))) {
            return;
        }

        $userModel = 'App\Models\User';
        $tenancyEnabled = false;

        foreach ($userData as $data) {
            // Extract role/permission data before creating user
            $roles = $data['roles'] ?? [];
            $permissions = $data['permissions'] ?? [];
            $tenantRoles = $data['tenant_roles'] ?? [];
            $tenantPermissions = $data['tenant_permissions'] ?? [];
            unset($data['roles'], $data['permissions'], $data['tenant_roles'], $data['tenant_permissions']);

            $user = $userModel::firstOrCreate(
                ['email' => $data['email']],
                $data
            );

            // Handle tenancy mode - sync roles/permissions per tenant
            if ($tenancyEnabled && (! empty($tenantRoles) || ! empty($tenantPermissions))) {
                foreach ($tenantRoles as $tenantId => $roleNames) {
                    $contextId = $tenantId === '_global' ? null : $tenantId;
                    setPermissionsTeamId($contextId);
                    $user->syncRoles($roleNames);
                }

                foreach ($tenantPermissions as $tenantId => $permissionNames) {
                    $contextId = $tenantId === '_global' ? null : $tenantId;
                    setPermissionsTeamId($contextId);
                    $user->syncPermissions($permissionNames);
                }
            } else {
                // Non-tenancy mode
                if (! empty($roles)) {
                    $user->syncRoles($roles);
                }

                if (! empty($permissions)) {
                    $user->syncPermissions($permissions);
                }
            }
        }
    }

    protected static function seedUserTenantPivot(string $pivot): void
    {
        if (blank($pivotData = json_decode($pivot, true))) {
            return;
        }

        $pivotTable = '';
        if (blank($pivotTable)) {
            return;
        }

        foreach ($pivotData as $row) {
            $uniqueKeys = [];

            if (isset($row['user_id'])) {
                $uniqueKeys['user_id'] = $row['user_id'];
            }

            $tenantForeignKey = 'team_id';
            if (! blank($tenantForeignKey) && isset($row[$tenantForeignKey])) {
                $uniqueKeys[$tenantForeignKey] = $row[$tenantForeignKey];
            }

            if (! empty($uniqueKeys)) {
                DB::table($pivotTable)->updateOrInsert($uniqueKeys, $row);
            }
        }
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            return;
        }

        /** @var \Illuminate\Database\Eloquent\Model $roleModel */
        $roleModel = Utils::getRoleModel();
        /** @var \Illuminate\Database\Eloquent\Model $permissionModel */
        $permissionModel = Utils::getPermissionModel();

        $tenancyEnabled = false;
        $teamForeignKey = 'team_id';

        foreach ($rolePlusPermissions as $rolePlusPermission) {
            $tenantId = $rolePlusPermission[$teamForeignKey] ?? null;

            // Set tenant context for role creation and permission sync
            if ($tenancyEnabled) {
                setPermissionsTeamId($tenantId);
            }

            $roleData = [
                'name' => $rolePlusPermission['name'],
                'guard_name' => $rolePlusPermission['guard_name'],
            ];

            // Include tenant ID in role data (can be null for global roles)
            if ($tenancyEnabled && ! blank($teamForeignKey)) {
                $roleData[$teamForeignKey] = $tenantId;
            }

            $role = $roleModel::firstOrCreate($roleData);

            if (! blank($rolePlusPermission['permissions'])) {
                $permissionModels = collect($rolePlusPermission['permissions'])
                    ->map(fn ($permission) => $permissionModel::firstOrCreate([
                        'name' => $permission,
                        'guard_name' => $rolePlusPermission['guard_name'],
                    ]))
                    ->all();

                $role->syncPermissions($permissionModels);
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (blank($permissions = json_decode($directPermissions, true))) {
            return;
        }

        /** @var \Illuminate\Database\Eloquent\Model $permissionModel */
        $permissionModel = Utils::getPermissionModel();

        foreach ($permissions as $permission) {
            if ($permissionModel::whereName($permission['name'])->doesntExist()) {
                $permissionModel::create([
                    'name' => $permission['name'],
                    'guard_name' => $permission['guard_name'],
                ]);
            }
        }
    }
}
