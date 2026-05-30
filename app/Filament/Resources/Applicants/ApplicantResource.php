<?php

namespace App\Filament\Resources\Applicants;

use App\Filament\Resources\Applicants\{
    Pages\EditApplicant,
    Pages\ListApplicants,
    Tables\ApplicantsTable
};
use App\Models\{
    Applicant,
    Area,
    Gender,
    JobTitle,
    Qualification
};
use Filament\Forms\Components\{
    Checkbox,
    DatePicker,
    FileUpload,
    Repeater,
    Select,
    Textarea,
    TextInput
};
use Filament\Resources\Resource;
use Filament\Schemas\Components\{
    Section,
    Tabs,
    Tabs\Tab,
    Utilities\Get
};
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ApplicantResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Applicant Tabs')
                    ->tabs([
                        Tab::make(__('labels.global.personal_info'))
                            ->schema([
                                TextInput::make('first_name')
                                    ->label(__('labels.global.first_name'))
                                    ->required(),
                                TextInput::make('last_name')
                                    ->label(__('labels.global.last_name'))
                                    ->required(),
                                TextInput::make('nid')
                                    ->label(__('labels.global.nid'))
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->validationMessages([
                                        'unique' => 'عفواً، هذا الرقم القومي مسجل مسبقاً في النظام.',
                                    ]),
                                Select::make('gender_id')
                                    ->label(__('labels.global.gender'))
                                    ->relationship('gender', 'name')
                                    ->getOptionLabelFromRecordUsing(fn(Gender $record) => $record->translated_name)
                                    ->required(),
                                TextInput::make('telephone')
                                    ->label(__('labels.global.telephone'))
                                    ->tel(),
                                TextInput::make('email')
                                    ->label(__('labels.global.email'))
                                    ->email(),
                                DatePicker::make('dob')
                                    ->label(__('labels.global.dob'))
                                    ->date()
                                    ->required(),
                                TextInput::make('address')
                                    ->label(__('labels.global.address')),
                                Select::make('area_id')
                                    ->label(__('labels.global.area'))
                                    ->relationship('area', 'name')
                                    ->createOptionForm([
                                        Section::make()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label(__('labels.global.area'))
                                                    ->required()
                                                    ->maxLength(255),
                                                Select::make('governorate')
                                                    ->label(__('labels.global.governorate'))
                                                    ->relationship('governorate', 'name')
                                                    ->required()
                                            ])
                                    ])
                                    ->createOptionUsing(function (array $data) {
                                        return Area::create([
                                            'name' => $data['name'],
                                            'governorate' => $data['governorate'],
                                        ])->id;
                                    })
                                    ->required()
                                    ->preload(),
                            ])
                            ->columns(3),
                        Tab::make(__('labels.global.education_info'))
                            ->schema([
                                Select::make('education_level_id')
                                    ->relationship('educationLevel', 'name')
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        app()->getLocale() === 'ar' ? $record->nameAR : $record->name
                                    )
                                    ->required()
                                    ->label(__('labels.global.education_level')),
                                Select::make('qualification_id')
                                    ->label(__('labels.global.qualification'))
                                    ->relationship('qualification', 'name')
                                    ->createOptionForm([
                                        Section::make()
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label(__('labels.global.name'))
                                                    ->required(),
                                            ])
                                            ->columnSpanFull(),
                                    ])
                                    ->createOptionUsing(function (array $data) {
                                        return Qualification::create([
                                            'name' => $data['name'],
                                        ])->id;
                                    })
                                    ->required()
                                    ->preload(),
                                TextInput::make('field_of_study')
                                    ->label(__('labels.global.field_of_study')),
                                TextInput::make('graduation_year')
                                    ->label(__('labels.global.graduation_year'))
                                    ->numeric(),
                            ])
                            ->columns(2),

                        Tab::make(__('labels.global.attachments'))
                            ->schema([
                                FileUpload::make('nid_image')
                                    ->label(__('labels.global.nid_image'))
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                                    ->image(),
                                FileUpload::make('client_image')
                                    ->label(__('labels.global.client_image'))
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                                    ->image(),
                                FileUpload::make('resume')
                                    ->label(__('labels.global.resume')),
                            ])
                            ->columns(2),

                        Tab::make(__('labels.global.work_experiences'))
                            ->schema([
                                Repeater::make('workExperiences')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('company')
                                            ->label(__('labels.global.company')),
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
                                            ->label(__('labels.global.start_date')),
                                        DatePicker::make('end_date')
                                            ->label(__('labels.global.end_date'))
                                            ->hidden(fn(Get $get) => $get('currently_working')),
                                        Checkbox::make('currently_working')
                                            ->label(__('labels.global.currently_working'))
                                            ->reactive(),
                                        Textarea::make('description')
                                            ->label(__('labels.global.description'))
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->label(__('labels.global.work_experiences'))
                                    ->createItemButtonLabel(__('labels.global.add_experience'))
                                    ->reorderable(false)
                            ])
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ApplicantsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApplicants::route('/'),
            'edit' => EditApplicant::route('/{record}/edit'),
        ];
    }
}
