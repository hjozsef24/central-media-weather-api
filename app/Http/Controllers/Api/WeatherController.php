<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeatherRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $query = WeatherRecord::query();

        if ($request->has('city')) {
            $query->where('name', $request->query('city'))
                ->where('created_at', '>=', Carbon::now()->subDay());
        }

        $records = $query->orderBy('fetched_at', 'desc')->get();

        return response()->json($records);
    }
}
