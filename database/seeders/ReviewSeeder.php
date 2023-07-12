<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

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


        $excelFile = storage_path('app/data-mc2.xlsx');
        // dd($excelFile);
        $data = Excel::toArray([], $excelFile);
        // dd($data[0]);
        foreach($data[2] as $row)
        {

            $review = new Review();
            $review->id = $row[0];
            $review->place_id = $row[1];
            $review->name = "Toretto";
            $review->description = $row[2];
            $review->rating = $row[3];

            $review->save();
        }
   
    }
}
