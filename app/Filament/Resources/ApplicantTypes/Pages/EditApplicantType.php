<?php

namespace App\Filament\Resources\ApplicantTypes\Pages;

use App\Filament\Resources\ApplicantTypes\ApplicantTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditApplicantType extends EditRecord
{
    protected static string $resource = ApplicantTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
