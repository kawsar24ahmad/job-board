<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->email,
            'password'=> Hash::make("123456"),
            'description' => fake()->text(),
            'contact_number'=>fake()->phoneNumber,
            'website_link'=>fake()->url,
            'address'=>fake()->address,
        ];
    }
}
