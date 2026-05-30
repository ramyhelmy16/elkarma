<?php

namespace App\Filament\Resources\JobTitles\Pages;

use App\Filament\Resources\JobTitles\JobTitleResource;
use Filament\Resources\Pages\ListRecords;

class ListJobTitles extends ListRecords
{
    protected static string $resource = JobTitleResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
