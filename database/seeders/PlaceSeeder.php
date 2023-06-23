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
        $place->name = 'Universitas Ciputra';
        $place->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $place->price = '[
            {
              "type": "Adult",
              "price": 50000
            },
            {
              "type": "Kid",
              "price": 25000
            }
          ]';
        $place->latitude = -7.292810;
        $place->longitude = 112.792570;
        $place->image_url = "https://lh3.googleusercontent.com/p/AF1QipNfCExwg--gjWgJCIQLuuxmqF7nloHEFi_-ylcT=s1360-w1360-h1020";
        $place->save();
    }
}
