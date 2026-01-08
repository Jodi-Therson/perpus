<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Currently borrowed books (status = borrowed)
        $currentLoans = Loan::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'borrowed')
            ->orderBy('borrow_date', 'desc')
            ->get();

        // Recently returned books
        $recentReturns = Loan::with('book')
            ->where('user_id', $user->id)
            ->where('status', 'returned')
            ->orderBy('returned_at', 'desc')
            ->limit(5)
            ->get();

        // Count statistics
        $stats = [
            'borrowed' => $currentLoans->count(),
            'returned' => Loan::where('user_id', $user->id)->where('status', 'returned')->count(),
            'overdue'  => Loan::where('user_id', $user->id)
                ->where('status', 'borrowed')
                ->where('due_date', '<', now())
                ->count(),
        ];

        return view('dashboard', compact('currentLoans', 'recentReturns', 'stats'));
    }
}
