<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Buat tabel reviews
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            // Opsional: Link ke loan_id untuk memastikan user hanya me-review transaksi spesifik
            // $table->foreignId('loan_id')->nullable()->constrained()->nullOnDelete(); 
            
            $table->unsignedTinyInteger('rating'); // 1 sampai 5
            $table->text('comment')->nullable();
            $table->timestamps();

            // Mencegah user spam review di buku yang sama (opsional, hapus jika user boleh review berkali-kali)
            // $table->unique(['user_id', 'book_id']);
        });

        // 2. Tambah kolom ke tabel books untuk caching nilai rating (Performance Optimization)
        Schema::table('books', function (Blueprint $table) {
            $table->decimal('average_rating', 3, 2)->default(0.00)->after('is_active'); // Contoh: 4.55
            $table->unsignedInteger('rating_count')->default(0)->after('average_rating');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['average_rating', 'rating_count']);
        });

        Schema::dropIfExists('reviews');
    }
};