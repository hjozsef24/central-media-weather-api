<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Budapest',  'latitude' => 47.497913, 'longitude' => 19.040236],
            ['name' => 'Vienna',    'latitude' => 48.208176, 'longitude' => 16.373819],
            ['name' => 'Berlin',    'latitude' => 52.520008, 'longitude' => 13.404954],
            ['name' => 'London',    'latitude' => 51.507351, 'longitude' => -0.127758],
            ['name' => 'Paris',     'latitude' => 48.856613, 'longitude' => 2.352222],
            ['name' => 'Rome',      'latitude' => 41.902782, 'longitude' => 12.496366],
            ['name' => 'Madrid',    'latitude' => 40.416775, 'longitude' => -3.703790],
            ['name' => 'Warsaw',    'latitude' => 52.229676, 'longitude' => 21.012229],
            ['name' => 'Prague',    'latitude' => 50.075539, 'longitude' => 14.437800],
            ['name' => 'Amsterdam', 'latitude' => 52.367984, 'longitude' => 4.903561],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
