<?php

namespace App\Filament\Resources\Services\Tables;

use App\Filament\Imports\ServiceImporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ImportAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.global.name'))
                    ->searchable(),
                TextColumn::make('main_sector')
                    ->label(__('labels.global.main_sectors'))
                    ->searchable(),
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
            ->header(view('filament.tableHeader', ['title' => __('labels.global.services')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([
                SelectFilter::make('main_sector')
                    ->label(__('labels.global.main_sectors'))
                    ->options(__('labels.main_sector'))
                    ->searchable()
                    ->query(
                        fn(Builder $query, $state) =>
                        $state['value']
                            ? $query->where('main_sector', __("labels.main_sector.{$state['value']}"))
                            : $query
                    ),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.service'))
                    ->modalHeading(__('labels.global.services')),
                ExportAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray'),
                ImportAction::make()
                    ->label(__('labels.global.import'))
                    ->importer(ServiceImporter::class)
                    ->color('warning')
                    ->icon('heroicon-o-arrow-up-tray'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
