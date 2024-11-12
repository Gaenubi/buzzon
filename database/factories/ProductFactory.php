<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Cat;
use App\Models\Subcat;
use App\Models\Product;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'subcat_id'  => Subcat::find(rand(1,10)),
            'description' => fake()->sentence(),
            'quantity' => rand(1,60),
            'image' => 'logo.jpg',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function green(): static
    {
        return $this->state(fn (array $attributes) => [
            'image' => 'GreenAbstract.jpg',
        ]);
    }

    public function ivy(): static
    {
        return $this->state(fn (array $attributes) => [
            'image' => 'Ivywalltexture.jpg',
        ]);
    }
}

