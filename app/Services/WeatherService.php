<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherRecord;
use Carbon\Carbon;

class WeatherService
{
    public function getAllWeatherRecords()
    {
        return WeatherRecord::orderBy('created_at', 'desc')->get();
    }

    public function getWeatherByCity(string $cityName)
    {
        $city = City::where('name', $cityName)->first();

        if (!$city) {
            throw new \Exception("City not found.");
        }

        return WeatherRecord::where('name', $cityName)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
