<?php

namespace App\Filament\Resources\Companies;

use App\Filament\Resources\Companies\{
    Pages\EditCompany,
    Pages\ListCompanies,
    Tables\CompaniesTable
};
use App\Models\{
    Company,
    Service
};
use Filament\Forms\Components\{
    FileUpload,
    Select,
    Textarea,
    TextInput
};
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

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
                        Select::make('service_id')
                            ->label(__('labels.global.service'))
                            ->relationship('service', 'name')
                            ->searchable()
                            ->preload()
                            ->columnSpan(2)
                            ->required()
                            ->createOptionForm([
                                TextInput::make("service_name")
                                    ->label(__('labels.global.service'))
                                    ->required()
                                    ->maxLength(255)
                            ])
                            ->createOptionUsing(function (array $data) {
                                return Service::create([
                                    'name' => $data['service_name'],
                                ])->id;
                            }),
                        TextInput::make('contact_person')
                            ->label(__('labels.global.contact_person'))
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('phone')
                            ->label(__('labels.global.phone'))
                            ->required()
                            ->tel(),
                        TextInput::make('address')
                            ->label(__('labels.global.address')),
                        TextInput::make('email')
                            ->label(__('labels.global.email_address'))
                            ->email(),
                        TextInput::make('website')
                            ->label(__('labels.global.website'))
                            ->url(),
                        FileUpload::make('logo_path')
                            ->label(__('labels.global.logo_path'))
                            ->image(),
                        FileUpload::make('tax_id')
                            ->label(__('labels.global.tax_id')),
                        FileUpload::make('registration_number')
                            ->label(__('labels.global.registration_number')),
                        Textarea::make('description')
                            ->label(__('labels.global.description'))
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return CompaniesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanies::route('/'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }
}
