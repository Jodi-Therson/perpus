<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),

                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'librarian' => 'Librarian',
                        'member' => 'Member',
                    ])
                    ->required(),

                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => $state ? bcrypt($state) : null)
                    ->required(fn($context) => $context === 'create')
                    ->label('Password')
                    ->maxLength(255)
                    ->nullable()
                    ->hiddenOn('edit'),

                // To allow editing password later:
                TextInput::make('new_password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => $state ? bcrypt($state) : null)
                    ->label('New Password')
                    ->maxLength(255)
                    ->nullable()
                    ->visibleOn('edit')
                    ->dehydrated(fn($state) => filled($state))
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('password', bcrypt($state));
                        }
                    }),
            ]);
    }
}
