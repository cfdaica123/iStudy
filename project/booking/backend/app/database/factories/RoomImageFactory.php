<?php

namespace Database\Factories;

use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomImageFactory extends Factory
{
    protected $model = RoomImage::class;

    public function definition()
    {
        return [
            'room_id' => \App\Models\Room::factory(),
            'image_path' => $this->faker->imageUrl(),
        ];
    }
}
