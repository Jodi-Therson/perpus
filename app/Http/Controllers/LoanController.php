<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Active loans
        $activeLoans = Loan::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'borrowed')
            ->orderBy('borrow_date', 'desc')
            ->get();

        // Loan history
        $loanHistory = Loan::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'returned')
            ->orderBy('returned_at', 'desc')
            ->paginate(10);

        return view('loans.index', compact('activeLoans', 'loanHistory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Prevent borrowing if no copies left
        if ($book->available_copies < 1) {
            return redirect()->back()->with('error', 'No copies available for this book.');
        }

        // Create loan record
        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays(14),
            'returned_at' => null,
            'status' => 'borrowed',
            'fine' => 0,
        ]);

        // Decrease available copies
        $book->decrement('available_copies');

        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }

    public function returnBook($id)
    {
        $loan = Loan::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'borrowed')
            ->firstOrFail();

        $loan->update([
            'returned_at' => now(),
            'status' => 'returned',
        ]);

        $loan->book->increment('available_copies');

        return back()->with('success', 'Book returned successfully!');
    }
}
