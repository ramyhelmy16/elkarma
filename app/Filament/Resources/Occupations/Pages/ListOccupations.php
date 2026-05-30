<?php

namespace App\Filament\Resources\Occupations\Pages;

use App\Filament\Resources\Occupations\OccupationResource;
use Filament\Resources\Pages\ListRecords;

class ListOccupations extends ListRecords
{
    protected static string $resource = OccupationResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
