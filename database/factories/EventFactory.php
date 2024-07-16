<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'poster' => $this->faker->image(storage_path('app/public/posters'), 800, 800, null, false),
            'event_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'venue_id' => Venue::all()->random()->id,
        ];
    }
}
