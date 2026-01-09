<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Loan;
use App\Models\Review;

class Book extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'author',
        'isbn',
        'publisher',
        'publication_year',
        'pages',
        'language',
        'description',
        'cover_path',
        'total_copies',
        'available_copies',
        'is_active',
        'average_rating', 
        'rating_count'    
    ];

    protected $casts = [
        'publication_year' => 'integer',
        'total_copies' => 'integer',
        'available_copies' => 'integer',
        'is_active' => 'boolean',
        'average_rating' => 'float',
        'rating_count' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function getTimesBorrowedAttribute()
    {
        return $this->loans()->count();
    }

    public function recalculateRating()
    {
        $avg = $this->reviews()->avg('rating');
        $count = $this->reviews()->count();

        $this->update([
            'average_rating' => round($avg, 2), 
            'rating_count' => $count
        ]);
    }
}
