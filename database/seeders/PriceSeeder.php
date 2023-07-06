<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PriceSeeder extends Seeder
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
        Price::truncate();
        Schema::enableForeignKeyConstraints();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $csvFile = fopen(__DIR__ . '/prices.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ";")) !== FALSE) {

            $price = new Price();
            $price->id = $data[0];
            $price->place_id = $data[1];
            $price->type = $data[2];
            $price->price = $data[3];
            $price->save();
        }
        fclose($csvFile);
    }
}
