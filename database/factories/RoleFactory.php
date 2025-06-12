<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //composer require fakerphp/faker
        return [
            'name' => $this->faker->unique()->word, // Sử dụng Faker để tạo tên ngẫu nhiên
        ];
    }
}
