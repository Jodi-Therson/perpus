<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Loan extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'due_date',
        'returned_at',
        'status',
        'fine'
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'due_date' => 'date',
        'returned_at' => 'date',
        'fine' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function markReturned($date = null)
    {
        $this->returned_at = $date ?? now();
        $this->status = 'returned';
        $this->save();
    }
}
