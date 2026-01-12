<?php

namespace App\Console\Commands;

use App\Services\OpenWeatherService;
use Illuminate\Console\Command;

class FetchWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches weather data for all cities and store it in the database';

    protected OpenWeatherService $weatherService;

    /**
     * Execute the console command.
     */
    public function __construct(OpenWeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle(): int
    {
        $records = $this->weatherService->fetchWeatherForAllCities();
        return Command::SUCCESS;
    }
}
