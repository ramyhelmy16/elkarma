<?php

namespace App\Filament\Resources\InsuranceTypes;

use App\Filament\Resources\InsuranceTypes\Pages\EditInsuranceType;
use App\Filament\Resources\InsuranceTypes\Pages\ListInsuranceTypes;
use App\Filament\Resources\InsuranceTypes\Tables\InsuranceTypesTable;
use App\Models\InsuranceType;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class InsuranceTypeResource extends Resource
{
    protected static ?string $model = InsuranceType::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.insurance_type');
    }

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nameAR')
                    ->label(__('labels.global.name_ar'))
                    ->required(),
                TextInput::make('name')
                    ->label(__('labels.global.name'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return InsuranceTypesTable::configure($table);
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
            'index' => ListInsuranceTypes::route('/'),
            'edit' => EditInsuranceType::route('/{record}/edit'),
        ];
    }
}
