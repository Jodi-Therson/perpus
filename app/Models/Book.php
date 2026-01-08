<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Loan;

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
        'is_active'
    ];

    protected $casts = [
        'publication_year' => 'integer',
        'total_copies' => 'integer',
        'available_copies' => 'integer',
        'is_active' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
