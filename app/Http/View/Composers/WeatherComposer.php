<?php

declare(strict_types=1);

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Tests\Unit\ExampleTest;

class WeatherComposer
{
    protected $cacheDuration = 3600;
    public $cacheKey = "weather";
    public $weather = [
                'hours' => [
                     [
                'airTemperature' => [
                    'sg' => 'null'
                ],
                'windSpeed' => [
                    'sg' => 'null'
                ]
            ]
        ]
    ];

    public function compose(View $view)
    {
        $ip = request()->ip();
        if (Cache::has($this->cacheKey)) {
            $weather =  Cache::get($this->cacheKey);
        }
        else {
            try {
                $weather = $this->getWeatherData($ip);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $weather = $this->weather;
            }
        }
        $view->with('weather', $weather);
    }

    protected function getWeatherData($ip)
    {
        $location = $this->getLocation($ip);
        return $this->getWeather($location['latitude'], $location['longitude']);
    }

    protected function getLocation($ip)
    {
        $response = Http::get("http://ipinfo.io/{$ip}/json");

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['loc'])) {
                list($latitude, $longitude) = explode(',', $data['loc']);
                return ['latitude' => $latitude, 'longitude' => $longitude];
            } else {
                throw new \Exception('Location information not available');
            }
        }
    }

    protected function getWeather($latitude, $longitude)
    {


            $response = Http::withHeaders([
                'Authorization' => env('STORMGLASS_API_KEY'),
            ])->get('https://api.stormglass.io/v2/weather/point', [
                'lat' => $latitude,
                'lng' => $longitude,
                'params' => 'airTemperature,windSpeed',
                'source' => 'sg',
            ]);
        if($response->failed()) {
            throw new \Exception('failed to fetch weather data');
        } else
        if ($response->successful()) {
            $weatherData = $response->json();
            Cache::put($this->cacheKey, $weatherData, $this->cacheDuration);
            return $weatherData;
        } else return $this->weather;

    }
}
