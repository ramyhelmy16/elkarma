<?php

namespace App\Filament\Resources\Genders;

use App\Filament\Resources\Genders\Pages\EditGender;
use App\Filament\Resources\Genders\Pages\ListGenders;
use App\Filament\Resources\Genders\Tables\GendersTable;
use App\Models\Gender;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class GenderResource extends Resource
{
    protected static ?string $model = Gender::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.gender');
    }

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('labels.global.name'))
                    ->required(),
                TextInput::make('nameAR')
                    ->label(__('labels.global.name_ar'))
                    ->required(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return GendersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGenders::route('/'),
            'edit' => EditGender::route('/{record}/edit'),
        ];
    }
}
