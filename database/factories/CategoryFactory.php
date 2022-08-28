<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->description,
            'name' => $this->faker->name,

            'price' => rand(100,200),
            'description' => $this->faker->text,
            'status' => 1,
        ];
    }
}
