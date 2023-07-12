<?php

namespace Database\Seeders;

use App\Models\PlaceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

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
   
   
           $excelFile = storage_path('app/data-mc2.xlsx');
           // dd($excelFile);
           $data = Excel::toArray([], $excelFile);
           // dd($data[0]);
           foreach($data[3] as $row)
           {
   
               $interest = new PlaceImage();
               $interest->place_id = $row[0];
               $interest->image_url = $row[1];
               $interest->save();
           }
           
    }
}
