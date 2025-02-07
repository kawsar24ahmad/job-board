<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id'=>   Company::inRandomOrder()->first()->id ?? Company::factory(),
            'title'=>fake()->jobTitle(),
            'description'=>fake()->sentence(),
            'tags' => json_encode(fake()->words(5)),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'location'=>fake()->city(),
            'job_type'=> 'Full Time',
            'salary_range'=>fake()->numberBetween(10000, 100000),
            'application_link'=>fake()->url(),
            'expire_date' => fake()->dateTimeBetween('-6 months', '+6 months'),
        ];
    }
}
