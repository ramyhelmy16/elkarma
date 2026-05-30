<?php

namespace App\Filament\Resources\WorkExperiences\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WorkExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('applicant.full_name')
                    ->label(__('labels.global.applicate_details'))
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                TextColumn::make('company')
                    ->label(__('labels.global.company'))
                    ->searchable(),
                TextColumn::make('job_title.name')
                    ->label(__('labels.global.position'))
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label(__('labels.global.start_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label(__('labels.global.end_date'))
                    ->date()
                    ->sortable(),
                IconColumn::make('currently_working')
                    ->label(__('labels.global.currently_working'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->header(view('filament.tableHeader', ['title' => __('labels.global.work_experiences')]))
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
                    ->label(__('labels.global.work_experience'))
                    ->modalHeading(__('labels.global.work_experience')),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
