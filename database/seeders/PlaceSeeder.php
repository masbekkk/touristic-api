<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class PlaceSeeder extends Seeder
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
    Place::truncate();
    Schema::enableForeignKeyConstraints();

    // Enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    $excelFile = storage_path('app/data-mc2.xlsx');
    // dd($excelFile);
    $data = Excel::toArray([], $excelFile);
    // dd($data[0]);
    foreach($data[0] as $row)
    {
      $place = new Place();
      $place->id = $row[0];
      $place->name = $row[1];
      $place->description = $row[2];
      $place->latitude = $row[3];
      $place->longitude = $row[4];
      $place->save();
    }
    // $csvFile = fopen(__DIR__ . '/places.csv', 'r');
    // // dd($csvFile);
    // while (($data = fgetcsv($csvFile, 1000, ";")) !== FALSE) {
    //   dd($data);

    //   $place = new Place();
    //   $place->id = $data[0];
    //   $place->name = $data[1];
    //   $place->description = $data[2];
    //   $place->latitude = $data[3];
    //   $place->longitude = $data[4];
    //   $place->save();
    // }
    // fclose($csvFile);

    // $place = new Place();
    // $place->id = "P10";
    // $place->name = 'Waterbom Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P11";
    // $place->name = 'p11 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P12";
    // $place->name = 'p12 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P13";
    // $place->name = 'p13 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P14";
    // $place->name = 'p15 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P15";
    // $place->name = 'p15 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P16";
    // $place->name = 'p16 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();

    // $place = new Place();
    // $place->id = "P17";
    // $place->name = 'p17 Bali';
    // $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
    // $place->latitude = -8.730570;
    // $place->longitude = 115.167800;
    // $place->save();
  }
}
