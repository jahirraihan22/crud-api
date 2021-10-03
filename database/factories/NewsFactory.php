<?php

namespace Database\Factories;

use App\Models\news;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = news::class;

    public function definition(): array
    {
    	return [
            'title' => $this->faker->name(),
            'description' =>  $this->faker->paragraph(),
            'author' => $this->faker->name(),
            'image' =>  $this->faker->name().".jpg",
            'category_id' => $this->faker->randomDigitNot(0),
    	];
    }
}
