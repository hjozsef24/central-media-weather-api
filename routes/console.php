<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('weather:fetch')->everyTenMinutes();