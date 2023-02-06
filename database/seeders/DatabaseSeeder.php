<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()
            ->firstOrCreate([
                'email' => 'vulehoangson1995@gmail.com'
            ], [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => bcrypt('985632'),
                'remember_token' => Str::random(10)
            ]);
    }
}
