<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

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


        $excelFile = storage_path('app/data-mc2.xlsx');
        // dd($excelFile);
        $data = Excel::toArray([], $excelFile);
        // dd($data[0]);
        foreach($data[4] as $row)
        {

            $price = new Price();
            $price->id = $row[0];
            $price->place_id = $row[1];
            $price->type = $row[2];
            $price->price = $row[3];
            $price->save();
        }
       
    }
}
