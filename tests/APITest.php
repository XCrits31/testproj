<?php

namespace Tests;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\View\Composers\WeatherComposer;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_connect_to_api_and_all_the_weather_stuff(): void
    {
        $nullw = [];
        $weather = new WeatherComposer();
        $data = [];
        try {
            $data = $weather->testGetWeatherData();
           // Log::debug($data);
        } catch (\Exception $e) {Log::error($e->getMessage());}
        $this->assertNotSame($nullw, $data);
    }
}
