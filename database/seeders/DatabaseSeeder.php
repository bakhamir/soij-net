<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Subscription;
use App\Models\Like;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(50)->create();
        // Profile::factory()->count(10)->create();
        // Subscription::factory()->count(10)->create();
        Like::factory()->count(10)->create();
    }
}
