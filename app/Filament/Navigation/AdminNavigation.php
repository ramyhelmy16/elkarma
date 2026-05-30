<?php

namespace App\Filament\Navigation;

use App\Filament\Pages\JobMatching;

use Filament\Navigation\{
    NavigationBuilder,
    NavigationGroup,
    NavigationItem,
};
use App\Filament\Resources\{
    Applicants\ApplicantResource,
    Governorates\GovernorateResource,
    JobTitles\JobTitleResource,
    Occupations\OccupationResource,
    Qualifications\QualificationResource,
    Services\ServiceResource,
    WorkExperiences\WorkExperienceResource,
    EducationLevels\EducationLevelResource,
    Areas\AreaResource,
    Companies\CompanyResource,
    Users\UserResource,
    Roles\RoleResource,
};
use App\Filament\Resources\ApplicantTypes\ApplicantTypeResource;
use App\Filament\Resources\ExperienceLevels\ExperienceLevelResource;
use App\Filament\Resources\ExtraBenefits\ExtraBenefitsResource;
use App\Filament\Resources\Genders\GenderResource;
use App\Filament\Resources\InsuranceTypes\InsuranceTypeResource;
use App\Filament\Resources\JobTypes\JobTypeResource;
use Filament\Support\Icons\Heroicon;
use Filament\Pages\Dashboard;

class AdminNavigation
{
    public static function make(NavigationBuilder $builder): NavigationBuilder
    {
        return $builder
            ->items([
                NavigationItem::make(__('labels.menus.dashboard'))
                    ->url(Dashboard::getUrl())
                    ->icon(Heroicon::Home),
                NavigationItem::make(__('labels.global.job_matching'))
                    ->url(JobMatching::getUrl())
                    ->icon(Heroicon::SquaresPlus),
            ])
            ->groups([
                NavigationGroup::make(__('labels.menus.applicant_management'))
                    ->items([
                        NavigationItem::make(__('labels.global.applicants'))
                            ->url(ApplicantResource::getUrl())
                            ->icon(Heroicon::OutlinedUserGroup),
                        NavigationItem::make(__('labels.global.work_experiences'))
                            ->url(WorkExperienceResource::getUrl())
                            ->icon(Heroicon::OutlinedSquaresPlus),
                        NavigationItem::make(__('labels.global.jobs'))
                            ->url(OccupationResource::getUrl())
                            ->icon(Heroicon::OutlinedWallet),
                    ]),
                NavigationGroup::make(__('labels.menus.companies_management'))
                    ->items([
                        NavigationItem::make(__('labels.global.companies'))
                            ->url(CompanyResource::getUrl())
                            ->icon(Heroicon::OutlinedBuildingLibrary),
                    ]),
                NavigationGroup::make(__('labels.menus.admin_settings'))
                    ->items([
                        NavigationItem::make(__('labels.global.governorates'))
                            ->url(GovernorateResource::getUrl())
                            ->icon(Heroicon::OutlinedGlobeAlt),
                        NavigationItem::make(__('labels.global.areas'))
                            ->url(AreaResource::getUrl())
                            ->icon(Heroicon::ArrowDownOnSquareStack),
                        NavigationItem::make(__('labels.global.services'))
                            ->url(ServiceResource::getUrl())
                            ->icon(Heroicon::OutlinedWrenchScrewdriver),
                        NavigationItem::make(__('labels.global.qualifications'))
                            ->url(QualificationResource::getUrl())
                            ->icon(Heroicon::OutlinedAcademicCap),
                        NavigationItem::make(__('labels.global.job_titles'))
                            ->url(JobTitleResource::getUrl())
                            ->icon(Heroicon::OutlinedPencilSquare),
                    ]),
                NavigationGroup::make(__('labels.menus.settings'))
                    ->items([
                        NavigationItem::make(__('labels.global.education_level'))
                            ->url(EducationLevelResource::getUrl())
                            ->icon(Heroicon::OutlinedAcademicCap),
                        NavigationItem::make(__('labels.global.experience_needed'))
                            ->url(ExperienceLevelResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                        NavigationItem::make(__('labels.global.applicant_type'))
                            ->url(ApplicantTypeResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                        NavigationItem::make(__('labels.global.extra_benefits'))
                            ->url(ExtraBenefitsResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                        NavigationItem::make(__('labels.global.gender'))
                            ->url(GenderResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                        NavigationItem::make(__('labels.global.insurance_type'))
                            ->url(InsuranceTypeResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                        NavigationItem::make(__('labels.global.job_type'))
                            ->url(JobTypeResource::getUrl())
                            ->icon(Heroicon::OutlinedClipboardDocumentCheck),
                    ]),

                NavigationGroup::make(__('labels.menus.admin_management'))
                    ->items([
                        NavigationItem::make(__('labels.global.users'))
                            ->url(UserResource::getUrl())
                            ->icon(Heroicon::OutlinedUsers),
                        NavigationItem::make(__('labels.global.roles'))
                            ->url(RoleResource::getUrl())
                            ->icon(Heroicon::OutlinedShieldCheck),
                    ]),
            ]);
    }
}
