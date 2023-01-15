<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'user_id' => 2,
            'event_category_id' => rand(1, 5),
            'address_id' => 1,
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'image' => 'teste',
            'participants' => 0,
            'date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'duration' => $this->faker->time(),
        ];
    }
}
