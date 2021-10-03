<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
    	return [
            'title' => $this->faker->sentence,
            'description' =>  $this->faker->paragraph
    	];
    }
}
