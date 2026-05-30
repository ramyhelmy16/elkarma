<?php

namespace App\Filament\Imports;

use App\Models\Area;
use App\Models\Governorate;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class AreaImporter extends Importer
{
    protected static ?string $model = Area::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label(__('labels.global.name'))
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('governorate')
                ->label(__('labels.global.governorate'))
                ->requiredMapping()
                ->relationship('governorate', 'name')
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): Area
    {
        $governorateName = trim($this->data['governorate'] ?? '');
        $governorate = Governorate::where('name', $governorateName)->first();

        return Area::firstOrNew([
            'name' => $this->data['name'],
            'governorate_id' => $governorate?->id,
        ]);
    }

    protected function beforeSave(): void
    {
        if (! $this->record->governorate_id && isset($this->data['governorate'])) {
            $name = trim($this->data['governorate']);
            $gov = Governorate::where('name', 'like', "%{$name}%")->first();

            if ($gov) {
                $this->record->governorate_id = $gov->id;
            }
        }
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your area import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
