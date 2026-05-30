<?php

namespace App\Filament\Resources\ExtraBenefits\Pages;

use App\Filament\Resources\ExtraBenefits\ExtraBenefitsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExtraBenefits extends EditRecord
{
    protected static string $resource = ExtraBenefitsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
