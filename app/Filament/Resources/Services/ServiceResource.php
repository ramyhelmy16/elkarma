<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\{
    Pages\EditService,
    Pages\ListServices,
    RelationManagers\CompaniesRelationManager,
    Tables\ServicesTable
};
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

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
                        Select::make('main_sector')
                            ->options(__('labels.main_sector'))
                            ->label(__('labels.global.main_sectors')),
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            CompaniesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServices::route('/'),
            'edit' => EditService::route('/{record}/edit'),
        ];
    }
}
