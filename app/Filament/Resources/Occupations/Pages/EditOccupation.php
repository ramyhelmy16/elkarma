<?php

namespace App\Filament\Resources\Occupations\Pages;

use App\Filament\Resources\Occupations\OccupationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOccupation extends EditRecord
{
    protected static string $resource = OccupationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
