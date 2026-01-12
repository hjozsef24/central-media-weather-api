<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        try {
            if ($request->has('city')) {
                $records = $this->weatherService->getWeatherByCity($request->query('city'));
            } else {
                $records = $this->weatherService->getAllWeatherRecords();
            }

            return response()->json($records);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
