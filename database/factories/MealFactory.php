<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
    $slug = slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'resturant_id' => '1',
            'category_id' => '1',
            'description' => $this->faker->paragraph,
            'price'=>$this->faker->randomFloat(2, 0, 100),
            'discount'=>$this->faker->randomFloat(2, 0, 5),

        ];
    }
}
