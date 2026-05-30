<?php

namespace App\Filament\Resources\Occupations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OccupationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jobTitle.name')
                    ->label(__('labels.global.job_title'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('company.name')
                    ->label(__('labels.global.company'))
                    ->numeric()
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
                TextColumn::make('experienceLevel.name')
                    ->label(__('labels.global.experience_needed'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->experienceLevel?->nameAR ?? $state)
                            : ($record->experienceLevel?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR']),
                TextColumn::make('jobType.name')
                    ->label(__('labels.global.job_type'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->jobType?->nameAR ?? $state)
                            : ($record->jobType?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR']),
                TextColumn::make('insuranceType.name')
                    ->label(__('labels.global.insurance_type'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->insuranceType?->nameAR ?? $state)
                            : ($record->insuranceType?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR'])
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('extraBenefits.name')
                    ->label(__('labels.global.extra_benefits'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->extraBenefits?->nameAR ?? $state)
                            : ($record->extraBenefits?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR'])
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('salary_min')
                    ->label(__('labels.global.salary_min'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('salary_max')
                    ->label(__('labels.global.salary_max'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('application_deadline')
                    ->label(__('labels.global.application_deadline'))
                    ->date()
                    ->sortable(),
                TextColumn::make('expected_start_date')
                    ->label(__('labels.global.expected_start_date'))
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('working_hours')
                    ->label(__('labels.global.working_hours'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('vacation_days')
                    ->label(__('labels.global.vacation_days'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('incentives')
                    ->label(__('labels.global.incentives'))
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('applicantType.name')
                    ->label(__('labels.global.applicant_type'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->applicantType?->nameAR ?? $state)
                            : ($record->applicantType?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR'])
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gender.name')
                    ->label(__('labels.global.gender_preference'))
                    ->formatStateUsing(
                        fn($state, $record) =>
                        app()->getLocale() === 'ar'
                            ? ($record->gender?->nameAR ?? $state)
                            : ($record->gender?->name ?? $state)
                    )
                    ->searchable(['name', 'nameAR'])
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('age_min')
                    ->label(__('labels.global.age_min'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('age_max')
                    ->label(__('labels.global.age_max'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('area.name')
                    ->label(__('labels.global.area'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label(__('labels.global.active'))
                    ->boolean(),
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
            ->searchDebounce(750)
            ->header(view('filament.tableHeader', ['title' => __('labels.global.jobs')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.job'))
                    ->modalHeading(__('labels.global.job')),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
