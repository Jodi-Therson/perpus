<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Currently Borrowed -->
                <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Currently Borrowed</p>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['borrowed'] }}</p>
                </div>

                <!-- Returned -->
                <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Books Returned</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['returned'] }}</p>
                </div>

                <!-- Overdue -->
                <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Overdue Books</p>
                    <p class="text-3xl font-bold text-red-600 dark:text-red-400">{{ $stats['overdue'] }}</p>
                </div>

            </div>


            <!-- Quick Actions -->
            <div class="flex gap-4">
                <a href="{{ route('books.index') }}"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Browse Books
                </a>

                <a href="{{ route('loans.index') }}"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                    View Loans
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg">
                    Edit Profile
                </a>
            </div>


            <!-- Currently Borrowed Books -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Currently Borrowed Books
                </h3>

                @if ($currentLoans->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">You have no active loans.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($currentLoans as $loan)
                            <div class="flex justify-between border-b dark:border-gray-700 pb-3">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $loan->book->title }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Due: {{ $loan->due_date->format('M d, Y') }}
                                    </p>

                                    @if($loan->due_date < now())
                                        <p class="text-red-600 dark:text-red-400 text-sm">Overdue!</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>


            <!-- Recently Returned Books -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Recently Returned
                </h3>

                @if ($recentReturns->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">No recent returns.</p>
                @else
                    <ul class="space-y-3">
                        @foreach ($recentReturns as $loan)
                            <li class="py-2 border-b dark:border-gray-700">
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loan->book->title }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Returned on {{ $loan->returned_at->format('M d, Y') }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
