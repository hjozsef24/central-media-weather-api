<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\WeatherRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $query = WeatherRecord::query();

        if ($request->has('city')) {
            $cityName = $request->query('city');

            $city = City::where('name', $cityName)->first();

            if (!$city) {
                return response()->json([
                    'message' => 'City not found.'
                ], 404);
            }

            $query->where('name', $cityName)
                ->where('created_at', '>=', Carbon::now()->subDay());
        }

        $records = $query->orderBy('created_at', 'desc')->get();

        return response()->json($records);
    }
}
