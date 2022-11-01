<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Podcast>
 */
class PodcastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name'          => $this->faker->unique()->name(),
            'description'   => $this->faker->paragraph(),
            'marketing_url' => $this->faker->url(),
            'feed_url'      => $this->faker->url(),
        ];
    }
}
