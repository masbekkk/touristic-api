<?php

namespace Database\Seeders;

use App\Models\PlaceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlaceImageSeeder extends Seeder
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
           PlaceImage::truncate();
           Schema::enableForeignKeyConstraints();
   
           // Enable foreign key checks
           DB::statement('SET FOREIGN_KEY_CHECKS=1');
   
   
           $csvFile = fopen(__DIR__ . '/place_images.csv', 'r');
           while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
   
               $interest = new PlaceImage();
               $interest->place_id = $data[0];
               $interest->image_url = $data[1];
               $interest->save();
           }
           fclose($csvFile);
    }
}
