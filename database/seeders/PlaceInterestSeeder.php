<?php

namespace Database\Seeders;

use App\Models\PlaceInterest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(__DIR__ . '/place_interest.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {

            $interest = new PlaceInterest();
            $interest->place_id = $data[0];
            $interest->interest_id = $data[1];
            $interest->save();

        } 
        fclose($csvFile);
    }
}
