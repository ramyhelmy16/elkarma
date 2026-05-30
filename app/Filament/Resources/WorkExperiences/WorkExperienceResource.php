<?php

namespace App\Filament\Resources\WorkExperiences;

use App\Filament\Resources\WorkExperiences\{
    Pages\EditWorkExperience,
    Pages\ListWorkExperiences,
    Tables\WorkExperiencesTable
};
use App\Models\{
    Applicant,
    JobTitle,
    WorkExperience
};
use Filament\Forms\Components\{
    DatePicker,
    Select,
    Textarea,
    TextInput,
    Toggle,
};
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class WorkExperienceResource extends Resource
{
    protected static ?string $model = WorkExperience::class;

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('applicant_id')
                    ->label(__('labels.global.applicant'))
                    ->relationship('applicant')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->full_name)
                    ->getSearchResultsUsing(function (string $search) {
                        return Applicant::whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"])
                            ->limit(50)
                            ->pluck('first_name', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('company')
                    ->label(__('labels.global.company'))
                    ->required(),
                Select::make('job_title_id')
                    ->label('المسمى الوظيفي')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options(JobTitle::pluck('name', 'id'))
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('اسم الوظيفة')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('الوصف')
                            ->maxLength(500),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return JobTitle::create([
                            'name' => $data['name'],
                            'description' => $data['description'] ?? null,
                        ])->id;
                    }),
                DatePicker::make('start_date')
                    ->label(__('labels.global.start_date'))
                    ->required(),
                DatePicker::make('end_date')
                    ->label(__('labels.global.end_date')),
                Toggle::make('currently_working')
                    ->label(__('labels.global.currently_working'))
                    ->required(),
                Textarea::make('description')
                    ->label(__('labels.global.description'))
                    ->columnSpanFull(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return WorkExperiencesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkExperiences::route('/'),
            'edit' => EditWorkExperience::route('/{record}/edit'),
        ];
    }
}
