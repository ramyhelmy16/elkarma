<?php

namespace App\Filament\Resources\Areas\Tables;

use App\Filament\Imports\AreaImporter;
use Filament\Actions\{
    BulkActionGroup,
    CreateAction,
    DeleteAction,
    DeleteBulkAction,
    EditAction,
    ImportAction
};
use Filament\Tables\{
    Columns\TextColumn,
    Filters\Filter,
    Table
};
use Filament\Forms\Components\DatePicker;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class AreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('labels.global.name'))
                    ->searchable(isIndividual: true)
                    ->sortable(),
                TextColumn::make('governorate.name')
                    ->label(__('labels.global.governorate'))
                    ->searchable(isIndividual: true)
                    ->sortable(),
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
            ->header(view('filament.tableHeader', ['title' => __('labels.global.areas')]))
            ->emptyStateHeading(__('labels.global.empty_state'))
            ->emptyStateDescription('')
            ->filters([
                Filter::make('created_at')
                    ->label(__('labels.timestamps.created_at'))
                    ->form([
                        DatePicker::make('created_from')
                            ->label(__('labels.timestamps.from_date'))
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->afterStateHydrated(function (DatePicker $component) {
                                if (!$component->getState()) {
                                    $component->state(now()->subDays(30)->format('Y-m-d'));
                                }
                            }),
                        DatePicker::make('created_until')
                            ->label(__('labels.timestamps.until_date'))
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->afterStateHydrated(function (DatePicker $component) {
                                if (!$component->getState()) {
                                    $component->state(now()->format('Y-m-d'));
                                }
                            }),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->icon(Heroicon::Plus)
                    ->label(__('labels.global.area'))
                    ->modalHeading(__('labels.global.area')),
                ExportAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray'),
                ImportAction::make()
                    ->importer(AreaImporter::class)
                    ->label(__('labels.global.import'))
                    ->color('warning')
                    ->icon('heroicon-o-arrow-up-tray'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
