<?php

namespace App\Filament\Resources\Governorates;

use App\Filament\Resources\Governorates\{
    Pages\EditGovernorate,
    Pages\ListGovernorates,
    RelationManagers\AreasRelationManager,
    Tables\GovernoratesTable
};
use App\Models\Governorate;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class GovernorateResource extends Resource
{
    protected static ?string $model = Governorate::class;

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
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return GovernoratesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AreasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGovernorates::route('/'),
            'edit' => EditGovernorate::route('/{record}/edit'),
        ];
    }
}
