<?php

namespace App\Filament\Resources\ApplicantTypes\Pages;

use App\Filament\Resources\ApplicantTypes\ApplicantTypeResource;
use Filament\Resources\Pages\ListRecords;

class ListApplicantTypes extends ListRecords
{
    protected static string $resource = ApplicantTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
