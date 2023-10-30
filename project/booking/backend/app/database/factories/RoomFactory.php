<?php


namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'hotel_id' => \App\Models\Hotel::factory(), // Tạo ngẫu nhiên một hotel_id bằng cách sử dụng factory của Hotel
            'category_id' => \App\Models\RoomCategory::factory(), // Tạo ngẫu nhiên một category_id bằng cách sử dụng factory của RoomCategory
            'name' => $this->faker->unique()->word,
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'available' => $this->faker->boolean,
        ];
    }
}
