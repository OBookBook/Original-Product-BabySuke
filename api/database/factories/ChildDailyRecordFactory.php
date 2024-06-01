<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Children;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildDailyRecord>
 */
class ChildDailyRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => Children::inRandomOrder()->first()->id,
            'health_status' => $this->faker->numberBetween(1, 5),
            'body_temperature' => $this->faker->randomFloat(2, 36.0, 40.0),
            'stool_count' => $this->faker->numberBetween(0, 5),
            'morning_medication_taken' => $this->faker->boolean,
            'afternoon_medication_taken' => $this->faker->boolean,
            'evening_medication_taken' => $this->faker->boolean,
            'bedtime_medication_taken' => $this->faker->boolean,
            'new_ability' => $this->faker->sentence,
            'comment' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
        ];
    }
}
