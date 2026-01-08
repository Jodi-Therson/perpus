<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('author')
                    ->required(),

                TextInput::make('isbn')
                    ->unique(ignoreRecord: true),

                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload(),

                TextInput::make('publisher'),

                TextInput::make('publication_year')
                    ->numeric()
                    ->minValue(1000)
                    ->maxValue(date('Y')),

                Textarea::make('description'),

                FileUpload::make('cover_path')
                    ->directory('books/covers')
                    ->image(),

                TextInput::make('total_copies')
                    ->numeric()
                    ->required(),

                TextInput::make('available_copies')
                    ->numeric()
                    ->required(),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
