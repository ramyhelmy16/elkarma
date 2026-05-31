<?php

namespace App\Filament\Resources\EducationLevels;

use App\Filament\Resources\EducationLevels\Pages\EditEducationLevel;
use App\Filament\Resources\EducationLevels\Pages\ListEducationLevels;
use App\Filament\Resources\EducationLevels\Tables\EducationLevelsTable;
use App\Models\EducationLevel;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class EducationLevelResource extends Resource
{
    protected static ?string $model = EducationLevel::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.education_level');
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
        return EducationLevelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEducationLevels::route('/'),
            'edit' => EditEducationLevel::route('/{record}/edit'),
        ];
    }
}
