<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChildDailyRecord;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AiDailyReportComment>
 */
class AiDailyReportCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_daily_record_id' => ChildDailyRecord::inRandomOrder()->first()->id,
            'comment' => $this->faker->numberBetween(1, 5),
        ];
    }
}
