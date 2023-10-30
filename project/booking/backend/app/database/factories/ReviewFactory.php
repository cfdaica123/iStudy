<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'hotel_id' => \App\Models\Hotel::factory(),
            'tour_id' => \App\Models\Tour::factory(),
            'room_id' => \App\Models\Room::factory(),
            'comment' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
