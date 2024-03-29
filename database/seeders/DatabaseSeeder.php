<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('cache:clear');
        // $this->call(InterestSeeder::class);
        // $this->call(PlaceSeeder::class);
        // $this->call(PlaceInterestSeeder::class);
        // $this->call(PlaceImageSeeder::class);
        $this->call(ReviewSeeder::class);
        // $this->call(PriceSeeder::class);
        \App\Models\User::factory(10)->create();

        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
