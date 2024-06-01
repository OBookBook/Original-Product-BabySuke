<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Children;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyGroup>
 */
class FamilyGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'child_id' => Children::inRandomOrder()->first()->id
        ];
    }
}