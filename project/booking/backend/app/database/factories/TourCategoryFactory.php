<?php

namespace Database\Factories;

use App\Models\TourCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourCategoryFactory extends Factory
{
    protected $model = TourCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
        ];
    }
}

