<?php

// database/factories/TourBookingFactory.php

namespace Database\Factories;

use App\Models\TourBooking;
use App\Models\User;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Room;

use Illuminate\Database\Eloquent\Factories\Factory;

class TourBookingFactory extends Factory
{
    protected $model = TourBooking::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'tour_id' => function () {
                return Tour::factory()->create()->id;
            },
            'hotel_id' => function () {
                return Hotel::factory()->create()->id;
            },
            'room_id' => function () {
                return Room::factory()->create()->id;
            },
            'check_in_date' => $this->faker->date(),
            'check_out_date' => $this->faker->date(),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'payment_status' => $this->faker->randomElement(['Paid', 'Unpaid']),
        ];
    }
}
