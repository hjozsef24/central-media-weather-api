<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $fillable = [
      'name',
      'latitude',
      'longitude'
   ];

   public function weatherRecords()
   {
      return $this->hasMany(WeatherRecord::class);
   }
}
