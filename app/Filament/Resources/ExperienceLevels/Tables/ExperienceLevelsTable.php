<?php

namespace App\Filament\Resources\ExperienceLevels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExperienceLevelsTable
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
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->searchDebounce(750)
            ->header(view('filament.tableHeader', ['title' => __('labels.global.education_level')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.experience_needed'))
                    ->modalHeading(__('labels.global.experience_needed')),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
