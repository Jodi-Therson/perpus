<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use APp\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $author = $request->author;
        $availability = $request->availability;
        $sort = $request->sort;

        $books = Book::with(['category', 'loans'])
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category_id', $category);
            })
            ->when($availability === 'available', function ($q) {
                $q->where('available_copies', '>', 0);
            });

        // Sorting
        match ($sort) {
            'newest' => $books->latest(),
            'alphabetical' => $books->orderBy('title'),
            'most_borrowed' => $books->withCount('loans')->orderByDesc('loans_count'),
            'top_rated' => $books->orderByDesc('average_rating'),
            default => $books->latest(),
        };

        $books = $books->paginate(9)->withQueryString();

        return view('books.index', [
            'books' => $books,
            'search' => $search,
            'categories' => Category::all(),
            'authors' => Book::select('author')->distinct()->pluck('author'),
        ]);
    }

    public function show(Book $book)
    {
        $book->load(['reviews.user', 'category']);
        
        $userReview = null;
        if (auth()->check()) {
            $userReview = $book->reviews()->where('user_id', auth()->id())->first();
        }

        return view('books.show', compact('book', 'userReview'));
    }
}
