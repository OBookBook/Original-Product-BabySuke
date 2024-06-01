<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ChildDailyRecord;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildSymptom>
 */
class ChildSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'record_id' => ChildDailyRecord::inRandomOrder()->first()->id,
            'symptom' => $this->faker->numberBetween(1, 5),
        ];
    }
}
