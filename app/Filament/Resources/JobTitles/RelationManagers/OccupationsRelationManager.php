<?php

namespace App\Filament\Resources\JobTitles\RelationManagers;

use App\Filament\Resources\Occupations\OccupationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class OccupationsRelationManager extends RelationManager
{
    protected static string $relationship = 'occupations';

    protected static ?string $relatedResource = OccupationResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
