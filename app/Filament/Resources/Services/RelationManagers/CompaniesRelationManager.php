<?php

namespace App\Filament\Resources\Services\RelationManagers;

use App\Filament\Resources\Companies\CompanyResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CompaniesRelationManager extends RelationManager
{
    protected static string $relationship = 'companies';

    protected static ?string $relatedResource = CompanyResource::class;

    public function form(Schema $schema): Schema
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
                            ->default(fn() => $this->getOwnerRecord()->name)
                            ->searchable()
                            ->preload()
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('email')
                            ->label(__('labels.global.email_address'))
                            ->email(),
                        TextInput::make('phone')
                            ->label(__('labels.global.phone'))
                            ->required()
                            ->tel(),
                        TextInput::make('address')
                            ->label(__('labels.global.address')),
                        TextInput::make('contact_person')
                            ->label(__('labels.global.contact_person'))
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('website')
                            ->label(__('labels.global.website'))
                            ->url(),
                        FileUpload::make('logo_path')
                            ->label(__('labels.global.logo_path'))
                            ->image()
                            ->required(),
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

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
