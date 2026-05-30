<?php

namespace App\Filament\Resources\ApplicantTypes;

use App\Filament\Resources\ApplicantTypes\Pages\EditApplicantType;
use App\Filament\Resources\ApplicantTypes\Pages\ListApplicantTypes;
use App\Filament\Resources\ApplicantTypes\Tables\ApplicantTypesTable;
use App\Models\ApplicantType;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;

use Filament\Tables\Table;

class ApplicantTypeResource extends Resource
{
    protected static ?string $model = ApplicantType::class;

    public static function getNavigationLabel(): string
    {
        return __('labels.global.applicant_types');
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
        return ApplicantTypesTable::configure($table);
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
            'index' => ListApplicantTypes::route('/'),
            'edit' => EditApplicantType::route('/{record}/edit'),
        ];
    }
}
