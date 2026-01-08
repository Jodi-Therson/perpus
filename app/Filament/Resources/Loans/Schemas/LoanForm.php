<?php

namespace App\Filament\Resources\Loans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required()
                    ->preload(),

                Select::make('book_id')
                    ->relationship('book', 'title')
                    ->searchable()
                    ->required()
                    ->preload(),

                DatePicker::make('borrow_date')
                    ->required()
                    ->default(now()),

                DatePicker::make('due_date')
                    ->required(),

                DatePicker::make('returned_at'),

                Select::make('status')
                    ->options([
                        'borrowed' => 'Borrowed',
                        'returned' => 'Returned',
                        'overdue' => 'Overdue',
                    ])
                    ->required(),

                TextInput::make('fine')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
