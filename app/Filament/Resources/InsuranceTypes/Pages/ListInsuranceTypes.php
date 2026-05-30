<?php

namespace App\Filament\Resources\InsuranceTypes\Pages;

use App\Filament\Resources\InsuranceTypes\InsuranceTypeResource;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceTypes extends ListRecords
{
    protected static string $resource = InsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
