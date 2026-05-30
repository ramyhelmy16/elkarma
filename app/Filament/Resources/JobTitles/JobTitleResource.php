<?php

namespace App\Filament\Resources\JobTitles;

use App\Filament\Resources\JobTitles\{
    Pages\EditJobTitle,
    Pages\ListJobTitles,
    RelationManagers\OccupationsRelationManager,
    Tables\JobTitlesTable
};
use Filament\Forms\Components\{
    Textarea,
    TextInput
};
use App\Models\JobTitle;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class JobTitleResource extends Resource
{
    protected static ?string $model = JobTitle::class;

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('labels.global.name'))
                            ->required(),
                        Textarea::make('description')
                            ->label(__('labels.global.description'))
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return JobTitlesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [OccupationsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobTitles::route('/'),
            'edit' => EditJobTitle::route('/{record}/edit'),
        ];
    }
}
