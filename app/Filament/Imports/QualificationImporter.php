<?php

namespace App\Filament\Imports;

use App\Models\Qualification;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class QualificationImporter extends Importer
{
    protected static ?string $model = Qualification::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label(__('labels.global.name'))
                ->requiredMapping()
                ->rules(['required', 'max:200']),
        ];
    }

    public function resolveRecord(): Qualification
    {
        return Qualification::firstOrNew([
            'name' => $this->data['name'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your qualification import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
