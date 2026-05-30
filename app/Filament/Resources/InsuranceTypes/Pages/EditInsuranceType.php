<?php

namespace App\Filament\Resources\InsuranceTypes\Pages;

use App\Filament\Resources\InsuranceTypes\InsuranceTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceType extends EditRecord
{
    protected static string $resource = InsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
