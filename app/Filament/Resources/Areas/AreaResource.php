<?php

namespace App\Filament\Resources\Areas;

use App\Filament\Resources\Areas\{
    Pages\ListAreas,
    Tables\AreasTable
};
use Filament\Resources\Resource;
use App\Models\Area;
use App\Models\Governorate;
use Filament\Forms\Components\{
    Select,
    TextInput
};
use Filament\Schemas\{
    Components\Section,
    Schema,
};
use Filament\Tables\Table;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

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
                        Select::make('governorate_id')
                            ->label(__('labels.global.governorate'))
                            ->relationship('governorate', 'name')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('governorate_name')
                                    ->label(__('labels.global.governorate'))
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->createOptionUsing(function (array $data) {
                                return Governorate::create(['name' => $data['governorate_name']])->id;
                            }),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return AreasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAreas::route('/'),
        ];
    }
}
