<?php

namespace App\Filament\Resources\ExtraBenefits;

use App\Filament\Resources\ExtraBenefits\Pages\EditExtraBenefits;
use App\Filament\Resources\ExtraBenefits\Pages\ListExtraBenefits;
use App\Filament\Resources\ExtraBenefits\Tables\ExtraBenefitsTable;
use App\Models\ExtraBenefits;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ExtraBenefitsResource extends Resource
{
    protected static ?string $model = ExtraBenefits::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.extra_benefits');
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
        return ExtraBenefitsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExtraBenefits::route('/'),
            'edit' => EditExtraBenefits::route('/{record}/edit'),
        ];
    }
}
