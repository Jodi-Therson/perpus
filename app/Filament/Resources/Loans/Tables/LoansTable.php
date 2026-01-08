<?php

namespace App\Filament\Resources\Loans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\Loan;
use Filament\Actions\Action as ActionsAction;

class LoansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User')->searchable(),
                TextColumn::make('book.title')->label('Book')->searchable(),
                TextColumn::make('borrow_date')->date(),
                TextColumn::make('due_date')->date(),
                TextColumn::make('returned_at')->date(),
                TextColumn::make('status')
                    ->colors([
                        'warning' => 'borrowed',
                        'success' => 'returned',
                        'danger' => 'overdue',
                    ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                // ---- CUSTOM ACTION: MARK AS RETURNED ----
                ActionsAction::make('mark_returned')
                    ->visible(fn(Loan $record) => $record->status === 'borrowed')
                    ->label('Mark Returned')
                    ->action(function (Loan $record) {
                        $record->update([
                            'returned_at' => now(),
                            'status' => 'returned',
                        ]);

                        // Increase available copies
                        $record->book->increment('available_copies');
                    })
                    ->color('success'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
