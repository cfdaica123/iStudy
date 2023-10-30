<?php

namespace Database\Factories;

use App\Models\RoomCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomCategoryFactory extends Factory
{
    protected $model = RoomCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
        ];
    }
}
