<?php

namespace App\Filament\Resources\JobTitles\Tables;

use App\Filament\Actions\SafeDeleteJobTitleAction;
use App\Filament\Imports\JobTitleImporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ImportAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class JobTitlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.global.name_ar'))
                    ->searchable(),
                TextColumn::make('name_en')
                    ->label(__('labels.global.name'))
                    ->searchable(),
                TextColumn::make('description')
                    ->label(__('labels.global.description'))
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('labels.timestamps.created_at'))
                    ->dateTime()
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('labels.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->searchDebounce(750)
            ->header(view('filament.tableHeader', ['title' => __('labels.global.job_titles')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([])
            ->recordActions([
                EditAction::make(),
                SafeDeleteJobTitleAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.job_title'))
                    ->modalHeading(__('labels.global.job_title')),
                ExportAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray'),
                ImportAction::make()
                    ->label(__('labels.global.import'))
                    ->importer(JobTitleImporter::class)
                    ->color('warning')
                    ->icon('heroicon-o-arrow-up-tray'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
