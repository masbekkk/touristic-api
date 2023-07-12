<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InterestSeeder extends Seeder
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
         Interest::truncate();
         Schema::enableForeignKeyConstraints();
 
         // Enable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $csvFile = fopen(__DIR__ . '/interest.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            $interest = new Interest();
            $interest->id = $data[0];
            $interest->name = $data[1];
            $interest->save();
        } 
        fclose($csvFile);
    }
}
