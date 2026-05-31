<?php

namespace App\Filament\Imports;

use App\Models\JobTitle;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class JobTitleImporter extends Importer
{
    protected static ?string $model = JobTitle::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nameAr')
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('description'),
        ];
    }

    public function resolveRecord(): JobTitle
    {
        return JobTitle::firstOrNew([
            'nameAr' => $this->data['nameAr'],
            'name' => $this->data['name'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your job title import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
