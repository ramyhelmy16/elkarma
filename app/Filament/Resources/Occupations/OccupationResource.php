<?php

namespace App\Filament\Resources\Occupations;

use App\Filament\Resources\Occupations\{
    Pages\EditOccupation,
    Pages\ListOccupations,
    Tables\OccupationsTable
};
use App\Models\Company;
use Filament\Forms\Components\{
    DatePicker,
    Select,
    TagsInput,
    Textarea,
    TextInput,
    Toggle
};
use App\Models\Occupation;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class OccupationResource extends Resource
{
    protected static ?string $model = Occupation::class;

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Job Details')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make(__('labels.global.main_information'))
                            ->columns(2)
                            ->schema([
                                Select::make('job_title_id')
                                    ->relationship('jobTitle', 'name')
                                    ->label(__('labels.global.job_title'))
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Select::make('company_id')
                                    ->label(__('labels.global.company'))
                                    ->relationship('company', 'name')
                                    ->createOptionForm([
                                        Section::make()
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label(__('labels.global.name'))
                                                    ->required(),
                                                Select::make('service_id')
                                                    ->label(__('labels.global.service'))
                                                    ->relationship('service', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->required(),
                                                TextInput::make('contact_person')
                                                    ->label(__('labels.global.contact_person'))
                                                    ->required(),
                                                TextInput::make('phone')
                                                    ->label(__('labels.global.phone'))
                                                    ->required()
                                                    ->tel(),
                                            ])
                                            ->columns(2),
                                    ])
                                    ->createOptionUsing(function (array $data) {
                                        return Company::create([
                                            'name' => $data['name'],
                                            'service_id' => $data['service_id'],
                                            'contact_person' => $data['contact_person'],
                                            'phone' => $data['phone'],
                                        ])->id;
                                    }),
                                Select::make('area_id')
                                    ->relationship('area', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->label(__('labels.global.area')),
                                Textarea::make('description')
                                    ->label(__('labels.global.description')),
                            ]),
                        Tab::make(__('labels.global.job_deatails'))
                            ->columns(2)
                            ->schema([
                                Textarea::make('requirements')
                                    ->columnSpan(1)
                                    ->label(__('labels.global.job_requirements')),
                                Textarea::make('required_skills')
                                    ->columnSpan(1)
                                    ->label(__('labels.global.required_skills')),
                                Textarea::make('extra_info')
                                    ->label(__('labels.global.extra_info')),
                            ]),
                        Tab::make(__('labels.global.education_experience'))
                            ->columns(2)
                            ->schema([
                                Select::make('education_level_id')
                                    ->relationship('educationLevel', 'name')
                                    ->default(4)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    )
                                    ->required()
                                    ->label(__('labels.global.education_level')),
                                Select::make('experience_level_id')
                                    ->label(__('labels.global.experience_needed'))
                                    ->relationship('experienceLevel', 'name')
                                    ->default(1)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    )
                                    ->required(),
                                Select::make('job_type_id')
                                    ->label(__('labels.global.job_type'))
                                    ->relationship('jobType', 'name')
                                    ->default(1)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    )
                                    ->required(),
                            ]),
                        Tab::make(__('labels.global.salary_working_horurs'))
                            ->columns(2)
                            ->schema([
                                TextInput::make('salary_min')
                                    ->numeric()
                                    ->prefix(__('labels.global.currency_eg'))
                                    ->columnSpan(1)
                                    ->label(__('labels.global.salary_min')),
                                TextInput::make('salary_max')
                                    ->numeric()
                                    ->prefix(__('labels.global.currency_eg'))
                                    ->columnSpan(1)
                                    ->label(__('labels.global.salary_max')),
                                DatePicker::make('application_deadline')
                                    ->columnSpan(1)
                                    ->default(now()->addDays(7))
                                    ->label(__('labels.global.application_deadline')),
                                DatePicker::make('expected_start_date')
                                    ->default(now()->addDays(30))
                                    ->label(__('labels.global.expected_start_date')),
                                TextInput::make('working_hours')
                                    ->columnSpan(1)
                                    ->default(160)
                                    ->label(__('labels.global.working_hours')),
                                TextInput::make('vacation_days')
                                    ->numeric()
                                    ->default(21)
                                    ->label(__('labels.global.vacation_days')),
                            ]),
                        Tab::make(__('labels.global.benefits_insurance'))
                            ->columns(2)
                            ->schema([
                                Select::make('insurance_type_id')
                                    ->label(__('labels.global.insurance_type'))
                                    ->relationship('insuranceType', 'name')
                                    ->default(1)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    ),
                                Select::make('extra_benefit_id')
                                    ->label(__('labels.global.extra_benefits'))
                                    ->relationship('extraBenefits', 'name')
                                    ->default(1)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    ),
                                Toggle::make('incentives')->label('حوافز ومكافآت')
                                    ->label(__('labels.global.incentives')),
                            ]),
                        Tab::make(__('labels.global.applicate_details'))
                            ->columns(2)
                            ->schema([
                                Select::make('applicant_type_id')
                                    ->label(__('labels.global.applicant_type'))
                                    ->relationship('applicantType', 'name')
                                    ->default(1)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    ),
                                Select::make('gender_id')
                                    ->label(__('labels.global.gender_preference'))
                                    ->relationship('gender', 'name')
                                    ->default(3)
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    ),
                                TextInput::make('age_min')
                                    ->numeric()
                                    ->default(20)
                                    ->label(__('labels.global.age_min')),
                                TextInput::make('age_max')
                                    ->numeric()
                                    ->default(40)
                                    ->label(__('labels.global.age_max')),
                                TagsInput::make('required_languages')
                                    ->label(__('labels.global.required_languages'))
                                    ->separator(',')
                                    ->suggestions([
                                        'عربي',
                                        'English',
                                        'French',
                                        'Dutch',
                                    ]),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->label(__('labels.global.active')),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return OccupationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOccupations::route('/'),
            'edit' => EditOccupation::route('/{record}/edit'),
        ];
    }
}
