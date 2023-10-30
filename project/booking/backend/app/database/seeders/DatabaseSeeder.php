<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(5)->create();
        \App\Models\Employee::factory()->count(5)->create();

        \App\Models\RoomCategory::factory()->times(5)->create();
        \App\Models\Room::factory()->times(5)->create();
        \App\Models\RoomImage::factory()->times(5)->create();

        \App\Models\Hotel::factory()->times(5)->create();

        \App\Models\TourCategory::factory()->times(5)->create();
        \App\Models\Tour::factory()->times(5)->create();
        \App\Models\TourImage::factory()->times(5)->create();

        \App\Models\Review::factory()->times(5)->create();

        \App\Models\TourBooking::factory()->times(5)->create();
        \App\Models\RoomBooking::factory()->times(5)->create();
    }
}
