<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
