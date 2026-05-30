<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use Filament\Forms\Components\{
    DateTimePicker,
    Select,
    TextInput
};
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = '';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('labels.global.name'))
                            ->required(),
                        TextInput::make('email')
                            ->label(__('labels.global.email_address'))
                            ->email()
                            ->required(),
                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                        DateTimePicker::make('email_verified_at')
                            ->label(__('labels.global.email_verified_at'))
                            ->nullable(),
                        TextInput::make('password')
                            ->label(__('labels.global.password'))
                            ->password()
                            ->hiddenOn('edit')
                            ->required(fn($operator) => $operator === 'create'),
                    ])
                    ->columnSpanFull()
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
        ];
    }
}
