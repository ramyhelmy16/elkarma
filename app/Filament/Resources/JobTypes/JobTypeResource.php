<?php

namespace App\Filament\Resources\JobTypes;

use App\Filament\Resources\JobTypes\Pages\EditJobType;
use App\Filament\Resources\JobTypes\Pages\ListJobTypes;
use App\Filament\Resources\JobTypes\Tables\JobTypesTable;
use App\Models\JobType;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class JobTypeResource extends Resource
{
    protected static ?string $model = JobType::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.job_type');
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
        return JobTypesTable::configure($table);
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
            'index' => ListJobTypes::route('/'),
            'edit' => EditJobType::route('/{record}/edit'),
        ];
    }
}
