<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment'
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Buku
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    // --- LOGIC OTOMATIS UPDATE RATING BUKU ---
    // Setiap kali review dibuat atau dihapus, hitung ulang rata-rata buku
    protected static function booted()
    {
        static::saved(function ($review) {
            $review->book->recalculateRating();
        });

        static::deleted(function ($review) {
            $review->book->recalculateRating();
        });
    }
}