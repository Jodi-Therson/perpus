<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MakeLibrarian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:librarian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new librarian';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');

        if (User::where('email', $email)->exists()) {
            $this->error('A user with this email already exists.');
            return self::FAILURE;
        }

        $password = $this->secret('Password');
        $confirm  = $this->secret('Confirm Password');

        if ($password !== $confirm) {
            $this->error('Passwords do not match.');
            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'librarian',
        ]);

        $this->info('Librarian user created successfully.');

        return self::SUCCESS;
    }
}
