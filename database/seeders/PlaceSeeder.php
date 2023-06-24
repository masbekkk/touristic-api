<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $place = new Place();
        $place->id = "P10";
        $place->name = 'Waterbom Bali';
        $place->description = "With an area of about 3.8 hectares, Waterbom Bali offers exciting and unforgettable experiences for all ages. If you're the type who likes to test your guts, you should try The Climax, one of the tallest slides in Asia! With various other water rides such as Boomerang, Superbowl, Python, Open Green Viper Slide, and many others. You can also conquer artificial waves by surfing in Flow Rider. Really the right tourist spot for those of you who want to have fun with family, and of course forget all your busy life!";
        $place->latitude = -8730570;
        $place->longitude = 115167800;
        $place->save();
    }
}
