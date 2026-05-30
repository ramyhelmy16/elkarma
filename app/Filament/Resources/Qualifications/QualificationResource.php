<?php

namespace App\Filament\Resources\Qualifications;

use App\Filament\Resources\Qualifications\{
    Pages\EditQualification,
    Pages\ListQualifications,
    RelationManagers\ApplicantsRelationManager,
    Tables\QualificationsTable
};
use App\Models\Qualification;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class QualificationResource extends Resource
{
    protected static ?string $model = Qualification::class;

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
        return QualificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [ApplicantsRelationManager::class,];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQualifications::route('/'),
            'edit' => EditQualification::route('/{record}/edit'),
        ];
    }
}
