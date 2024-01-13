<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->unique()->sentence(3),
            'amount' => fake()->numberBetween(1000000,10000000),
            'company_id' => Company::factory()->create()->id,
            'contact_id' => Contact::factory()->create()->id,
            'closed_date' => fake()->date()
        ];
    }
}