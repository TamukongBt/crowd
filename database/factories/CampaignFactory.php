<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realTextBetween(10, 20),
            'description' => $this->faker->text(),
            'link' => $this->faker->url(),
            'userid' => $this->faker->randomNumber(),
            'image' => $this->faker->imageUrl(),
            'goal' => $this->faker->randomNumber(),
            'raised' => $this->faker->randomNumber(),
            'expiry' => $this->faker->date(),
        ];
    }
}
