<?php

namespace App\Filament\Resources\ExperienceLevels\Pages;

use App\Filament\Resources\ExperienceLevels\ExperienceLevelResource;
use Filament\Resources\Pages\ListRecords;

class ListExperienceLevels extends ListRecords
{
    protected static string $resource = ExperienceLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
