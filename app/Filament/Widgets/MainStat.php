<?php

namespace App\Filament\Widgets;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\JobTitle;
use App\Models\Occupation;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MainStat extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('labels.global.applicants'), Applicant::count())
                ->description("المتقدمين الحاليين")
                ->color("success")
                ->descriptionColor("info")
                ->descriptionIcon(Heroicon::OutlinedUserGroup, IconPosition::Before),

            Stat::make(__('labels.global.jobs'), Occupation::count())
                ->description("الوظائف الحالية")
                ->descriptionColor("info")
                ->descriptionIcon(Heroicon::OutlinedWallet, IconPosition::Before),

            Stat::make(__('labels.global.companies'), Company::count())
                ->description("الشركات الحالية")
                ->descriptionColor("info")
                ->descriptionIcon(Heroicon::OutlinedBuildingLibrary, IconPosition::Before)
        ];
    }
}
