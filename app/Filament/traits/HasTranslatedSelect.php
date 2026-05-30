<?php

namespace App\Filament\traits;

use Filament\Tables\Columns\TextColumn;

trait HasTranslatedSelect
{
    public static function translatedColumn(
        string $column,
        string $translationKey,
        ?string $label = null
    ): TextColumn {
        return TextColumn::make($column)
            ->label($label ?? __("labels.global.$column"))
            ->formatStateUsing(
                fn($state) =>
                $state
                    ? __("labels.$translationKey.$state")
                    : '-'
            );
    }
}
