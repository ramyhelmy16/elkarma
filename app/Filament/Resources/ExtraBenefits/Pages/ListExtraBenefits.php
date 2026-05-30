<?php

namespace App\Filament\Resources\ExtraBenefits\Pages;

use App\Filament\Resources\ExtraBenefits\ExtraBenefitsResource;
use Filament\Resources\Pages\ListRecords;

class ListExtraBenefits extends ListRecords
{
    protected static string $resource = ExtraBenefitsResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
