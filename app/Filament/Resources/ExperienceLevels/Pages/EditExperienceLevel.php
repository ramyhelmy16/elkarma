<?php

namespace App\Filament\Resources\ExperienceLevels\Pages;

use App\Filament\Resources\ExperienceLevels\ExperienceLevelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExperienceLevel extends EditRecord
{
    protected static string $resource = ExperienceLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
