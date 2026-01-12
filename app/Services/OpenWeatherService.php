<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherRecord;
use Illuminate\Support\Facades\Http;

class OpenWeatherService
{
    protected string $apiUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.open_weather.api_url');
        $this->apiKey = config('services.open_weather.api_key');
    }

    public function fetchWeatherForAllCities(): array
    {
        $results = [];

        $cities = City::all();

        foreach ($cities as $city) {
            $data = $this->fetchWeather($city->latitude, $city->longitude);
            if (!$data) {
                continue;
            }

            $record = WeatherRecord::create([
                'city_id' => $city->id,
                'name' => $city->name,
                'latitude' => $city->latitude,
                'longitude' => $city->longitude,
                'temperature' => $data['main']['temp'],
                'pressure' => $data['main']['pressure'],
                'humidity' => $data['main']['humidity'],
                'temp_min' => $data['main']['temp_min'],
                'temp_max' => $data['main']['temp_max'],
            ]);

            $results[] = $record;
        }

        return $results;
    }

    protected function fetchWeather(float $lat, float $lon): ?array
    {
        $response = Http::get($this->apiUrl, [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $this->apiKey,
            'units' => 'metric'
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}
