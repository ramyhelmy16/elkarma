<?php

namespace App\Filament\Resources\Qualifications\Tables;

use App\Filament\Imports\QualificationImporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ImportAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class QualificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.global.name'))
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
            ->header(view('filament.tableHeader', ['title' => __('labels.global.qualifications')]))
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
                    ->label(__('labels.global.qualification'))
                    ->modalHeading(__('labels.global.qualification')),
                ExportAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray'),
                ImportAction::make()
                    ->label(__('labels.global.import'))
                    ->importer(QualificationImporter::class)
                    ->color('warning')
                    ->icon('heroicon-o-arrow-up-tray'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
