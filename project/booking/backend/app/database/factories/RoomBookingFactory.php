<?php

namespace Database\Factories;

use App\Models\RoomBooking;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomBookingFactory extends Factory
{
    protected $model = RoomBooking::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'room_id' => function () {
                return \App\Models\Room::factory()->create()->id;
            },
            'check_in_date' => $this->faker->date(),
            'check_out_date' => $this->faker->date(),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'payment_status' => $this->faker->randomElement(['Paid', 'Unpaid']),
        ];
    }
}
