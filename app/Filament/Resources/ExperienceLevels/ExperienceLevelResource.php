<?php

namespace App\Filament\Resources\ExperienceLevels;

use App\Filament\Resources\ExperienceLevels\Pages\EditExperienceLevel;
use App\Filament\Resources\ExperienceLevels\Pages\ListExperienceLevels;
use App\Filament\Resources\ExperienceLevels\Tables\ExperienceLevelsTable;
use App\Models\ExperienceLevel;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ExperienceLevelResource extends Resource
{
    protected static ?string $model = ExperienceLevel::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.experience_needed');
    }

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('labels.global.name_ar'))
                    ->required(),
                TextInput::make('name_en')
                    ->label(__('labels.global.name'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ExperienceLevelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExperienceLevels::route('/'),
            'edit' => EditExperienceLevel::route('/{record}/edit'),
        ];
    }
}
