<?php

namespace App\Filament\Resources\Applicants\Tables;

use App\Filament\traits\HasTranslatedSelect;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicantsTable
{
    use HasTranslatedSelect;

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('client_image')
                    ->label(__('labels.global.client_image')),
                TextColumn::make('full_name')
                    ->label(__('labels.global.full_name'))
                    ->state(function ($record): string {
                        return "{$record->first_name} {$record->last_name}";
                    })
                    ->searchable(['first_name', 'last_name']),
                TextColumn::make('nid')
                    ->label(__('labels.global.nid'))
                    ->searchable(),
                TextColumn::make('telephone')
                    ->label(__('labels.global.telephone'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('labels.global.email'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('dob')
                    ->label(__('labels.global.dob'))
                    ->date()
                    ->sortable(),
                TextColumn::make('educationLevel.name')
                    ->label(__('labels.global.education_level'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->educationLevel?->nameAR ?? $state)
                            : ($record->educationLevel?->name ?? $state)
                    )
                    ->searchable(),
                TextColumn::make('qualification.name')
                    ->label(__('labels.global.qualification'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('field_of_study')
                    ->label(__('labels.global.field_of_study'))
                    ->searchable(),
                TextColumn::make('graduation_year')
                    ->label(__('labels.global.graduation_year'))
                    ->sortable(),
                TextColumn::make('address')
                    ->label(__('labels.global.address'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('area.name')
                    ->label(__('labels.global.area'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->header(view('filament.tableHeader', ['title' => __('labels.global.applicants')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.applicant'))
                    ->modalHeading(__('labels.global.applicant')),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
