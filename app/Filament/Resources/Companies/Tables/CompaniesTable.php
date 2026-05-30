<?php

namespace App\Filament\Resources\Companies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompaniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->label(__('labels.global.logo_path'))
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('labels.global.name'))
                    ->searchable(),
                TextColumn::make('service.name')
                    ->label(__('labels.global.service'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('contact_person')
                    ->label(__('labels.global.contact_person'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('labels.global.phone'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('labels.global.email_address'))
                    ->searchable(),
                TextColumn::make('address')
                    ->label(__('labels.global.address'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('website')
                    ->label(__('labels.global.website'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('tax_id')
                    ->label(__('labels.global.tax_id'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('registration_number')
                    ->label(__('labels.global.registration_number'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('labels.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('labels.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->header(view('filament.tableHeader', ['title' => __('labels.global.companies')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon('heroicon-o-plus')
                    ->label(__('labels.global.company'))
                    ->modalHeading(__('labels.global.company')),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
