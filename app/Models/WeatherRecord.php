<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherRecord extends Model
{
    protected $fillable = [
        'city_id',
        'name',
        'latitude',
        'longitude',
        'temperature',
        'pressure',
        'humidity',
        'temp_min',
        'temp_max',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'temperature' => 'float',
        'temp_min' => 'float',
        'temp_max' => 'float',
        'pressure' => 'integer',
        'humidity' => 'integer',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
