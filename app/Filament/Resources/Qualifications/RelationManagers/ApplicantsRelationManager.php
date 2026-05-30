<?php

namespace App\Filament\Resources\Qualifications\RelationManagers;

use App\Filament\Resources\Applicants\ApplicantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ApplicantsRelationManager extends RelationManager
{
    protected static string $relationship = 'applicants';

    protected static ?string $relatedResource = ApplicantResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
