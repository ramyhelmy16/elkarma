<?php

namespace App\Filament\Imports;

use App\Models\Service;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class ServiceImporter extends Importer
{
    protected static ?string $model = Service::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label(__('labels.global.name'))
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('main_sector')
                ->label(__('labels.global.main_sectors'))
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): Service
    {
        return Service::firstOrNew([
            'name' => $this->data['name'],
            'main_sector' => $this->data['main_sector'] ?? null,
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your service import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
