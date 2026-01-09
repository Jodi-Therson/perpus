<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        // Validasi input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Cek apakah user pernah meminjam buku ini (Opsional, tapi disarankan)
        // Jika Anda ingin user bisa rating tanpa meminjam, hapus blok if ini.
        $hasBorrowed = $book->loans()
            ->where('user_id', Auth::id())
            ->whereNotNull('returned_at') // Pastikan sudah dikembalikan
            ->exists();

        if (!$hasBorrowed) {
             return back()->with('error', 'Anda harus meminjam dan mengembalikan buku ini sebelum memberikan ulasan.');
        }

        // Cek apakah user sudah pernah review buku ini (Mencegah spam)
        $existingReview = Review::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        if ($existingReview) {
            // Jika ingin update review lama:
            $existingReview->update($validated);
            $message = 'Ulasan Anda berhasil diperbarui!';
        } else {
            // Buat review baru
            $book->reviews()->create([
                'user_id' => Auth::id(),
                'rating' => $validated['rating'],
                'comment' => $validated['comment'],
            ]);
            $message = 'Terima kasih atas ulasan Anda!';
        }

        return back()->with('status', $message);
    }
}