<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            My Loans
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">


            <!-- =======================
                 ACTIVE LOANS
            ======================== -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Currently Borrowed Books
                </h3>

                @if ($activeLoans->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">You have no active loans.</p>
                @else
                <div class="space-y-5">
                    @foreach ($activeLoans as $loan)
                    <div class="flex items-start gap-4 border-b dark:border-gray-700 pb-4">

                        <!-- Cover -->
                        @if($loan->book->cover_path)
                        <img src="{{ asset('storage/' . $loan->book->cover_path) }}"
                            class="w-20 h-28 object-cover rounded-md shadow">
                        @else
                        <div class="w-20 h-28 bg-gray-300 dark:bg-gray-700 rounded-md flex items-center justify-center text-gray-600 dark:text-gray-300">
                            No Cover
                        </div>
                        @endif

                        <!-- Book Info -->
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $loan->book->title }}
                            </h4>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Borrowed: {{ $loan->borrow_date->format('M d, Y') }}
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Due: {{ $loan->due_date->format('M d, Y') }}
                            </p>

                            @php
                            $now = now();
                            $due = \Carbon\Carbon::parse($loan->due_date);
                            $diff = $now->diff($due);
                            @endphp

                            @if($due->isPast())
                            <span class="inline-block mt-2 px-3 py-1 bg-red-600 text-white text-xs rounded-full">
                                Overdue
                            </span>
                            @else
                            <span class="inline-block mt-2 px-3 py-1 bg-blue-600 text-white text-xs rounded-full">
                                {{ $diff->d }}d {{ $diff->h }}h {{ $diff->i }}m {{ $diff->s }}s remaining
                            </span>
                            @endif
                        </div>

                        <!-- Return Button (RIGHT SIDE) -->
                        <div class="ml-auto">
                            <form action="{{ route('loans.return', $loan->id) }}" method="POST">
                                @csrf
                                <button
                                    onclick="return confirm('Are you sure you want to return this book?')"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                    Return Book
                                </button>

                            </form>
                        </div>

                    </div>
                    @endforeach
                </div>
                @endif
            </div>




            <!-- =======================
                 LOAN HISTORY
            ======================== -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Loan History
                </h3>

                @if ($loanHistory->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">No past loans found.</p>
                @else
                <div class="space-y-5">
                    @foreach ($loanHistory as $loan)
                    <div class="flex items-center gap-4 border-b dark:border-gray-700 pb-4">

                        <!-- Cover -->
                        @if($loan->book->cover_path)
                        <img src="{{ asset('storage/' . $loan->book->cover_path) }}"
                            class="w-20 h-28 object-cover rounded-md shadow">
                        @else
                        <div class="w-20 h-28 bg-gray-300 dark:bg-gray-700 rounded-md flex items-center justify-center text-gray-600 dark:text-gray-300">
                            No Cover
                        </div>
                        @endif

                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $loan->book->title }}
                            </h4>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Borrowed: {{ $loan->borrow_date->format('M d, Y') }}
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Returned: {{ $loan->returned_at->format('M d, Y') }}
                            </p>
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $loanHistory->links() }}
                </div>

                @endif
            </div>


        </div>
    </div>

</x-app-layout>