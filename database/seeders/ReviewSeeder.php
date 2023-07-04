<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $csvFile = fopen(__DIR__ . '/reviews.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {

            $review = new Review();
            $review->id = $data[0];
            $review->place_id = $data[1];
            $review->name = "Toretto";
            $review->description = $data[2];
            $review->rating = $data[3];

            $review->save();
        }
        fclose($csvFile);
    }
}
