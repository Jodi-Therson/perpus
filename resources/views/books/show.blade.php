<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb / Back Navigation -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('books.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Koleksi
                        </a>
                    </li>
                </ol>
            </nav>

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">

                <!-- Main Content Grid -->
                <div class="md:flex">

                    <!-- LEFT COLUMN: Cover Image -->
                    <div class="md:w-1/3 lg:w-1/4 bg-gray-50 dark:bg-gray-900/50 p-8 flex items-start justify-center border-r border-gray-100 dark:border-gray-700">
                        <div class="relative group w-48 shadow-2xl rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                            @if($book->cover_path)
                            <img src="{{ asset('storage/' . $book->cover_path) }}"
                                alt="{{ $book->title }}"
                                class="w-full h-auto object-cover">
                            @else
                            <!-- Modern Placeholder -->
                            <div class="w-full h-72 bg-gradient-to-br from-indigo-500 to-purple-600 flex flex-col items-center justify-center text-white p-4 text-center">
                                <i class="fa-solid fa-book-open text-4xl mb-3 opacity-80"></i>
                                <span class="font-bold text-sm line-clamp-2">{{ $book->title }}</span>
                                <span class="text-xs mt-1 opacity-75">{{ $book->author }}</span>
                            </div>
                            @endif

                            <!-- Status Badge Floating -->
                            <div class="absolute top-2 right-2">
                                @if($book->available_copies > 0)
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-green-500 text-white shadow-sm">
                                    Tersedia
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-red-500 text-white shadow-sm">
                                    Habis
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Details -->
                    <div class="md:w-2/3 lg:w-3/4 p-8 flex flex-col">

                        <!-- Title & Author Header -->
                        <div class="mb-6">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                @if($book->category)
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300">
                                    {{ $book->category->name }}
                                </span>
                                @endif
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    {{ $book->language ?? 'Bahasa Indonesia' }}
                                </span>
                            </div>

                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2 leading-tight">
                                {{ $book->title }}
                            </h1>
                            @if($book->subtitle)
                            <p class="text-lg text-gray-500 dark:text-gray-400 font-light italic mb-2">{{ $book->subtitle }}</p>
                            @endif

                            <p class="text-lg text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                <span class="text-gray-400 text-sm uppercase tracking-wide font-semibold">Penulis:</span>
                                {{ $book->author }}
                            </p>
                        </div>

                        <!-- Synopsis / Description -->
                        <div class="mb-8 prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-2 border-b border-gray-100 dark:border-gray-700 pb-1">Sinopsis</h3>
                            <p class="whitespace-pre-line leading-relaxed">
                                {{ $book->description ?: 'Tidak ada deskripsi tersedia untuk buku ini.' }}
                            </p>
                        </div>

                        <!-- Metadata Grid -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8 bg-gray-50 dark:bg-gray-900/50 p-5 rounded-xl border border-gray-100 dark:border-gray-700">
                            <div>
                                <span class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">ISBN</span>
                                <span class="block font-medium text-gray-900 dark:text-white mt-1">{{ $book->isbn ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Penerbit</span>
                                <span class="block font-medium text-gray-900 dark:text-white mt-1">{{ $book->publisher ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Tahun</span>
                                <span class="block font-medium text-gray-900 dark:text-white mt-1">{{ $book->publication_year ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Stok</span>
                                <span class="block font-medium mt-1 {{ $book->available_copies > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $book->available_copies }} Buku
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-auto pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row gap-4 justify-end items-center">

                            <form method="POST" action="{{ route('loans.store') }}" class="w-full sm:w-auto">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                @if($book->available_copies > 0)
                                <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:-translate-y-0.5">
                                    <i class="fa-solid fa-book-bookmark mr-2"></i> Pinjam Buku
                                </button>
                                @else
                                <button type="button" disabled class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-lg text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-800 cursor-not-allowed">
                                    <i class="fa-solid fa-ban mr-2"></i> Stok Habis
                                </button>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- =======================
                 REVIEWS SECTION
            ======================== -->
            <div class="mt-8 bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 p-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-comments text-indigo-600"></i> Ulasan Pembaca
                </h3>

                <!-- Review Form -->
                @auth
                <div class="mb-10 bg-gray-50 dark:bg-gray-900/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide mb-4">
                        {{ $userReview ? 'Edit Ulasan Anda' : 'Tulis Ulasan' }}
                    </h4>

                    <!-- Alert Flash Message -->
                    @if(session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if(session('status'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Rating</label>
                            <div class="flex gap-4">
                                @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden peer"
                                        {{ (old('rating') == $i || ($userReview && $userReview->rating == $i)) ? 'checked' : '' }}>

                                    <!-- SVG Star Replacement -->
                                    <svg class="w-8 h-8 text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400 transition-colors fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                        <path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z" />
                                    </svg>
                                    </label>
                                    @endfor
                            </div>
                            @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Komentar</label>
                            <textarea name="comment" rows="3" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500" placeholder="Bagaimana pendapatmu tentang buku ini?">{{ old('comment', $userReview->comment ?? '') }}</textarea>
                            @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>
                @else
                <div class="mb-10 p-6 bg-gray-50 dark:bg-gray-900/50 rounded-xl text-center border border-gray-200 dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-400 mb-2">Silakan login untuk memberikan ulasan.</p>
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Masuk disini</a>
                </div>
                @endauth

                <!-- Reviews List -->
                <div class="space-y-6">
                    @forelse($book->reviews as $review)
                    <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-300 font-bold">
                                    {{ substr($review->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-gray-900 dark:text-white">{{ $review->user->name }}</h5>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-0.5 text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$review->rating)
                                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                        <path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z" />
                                    </svg>
                                    @else
                                    <i class="fa-regular fa-star text-gray-300 dark:text-gray-600 text-[10px]"></i>
                                    @endif
                                    @endfor
                            </div>
                        </div>
                        <p class="mt-3 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            {{ $review->comment }}
                        </p>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-400 text-center italic">Belum ada ulasan untuk buku ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>