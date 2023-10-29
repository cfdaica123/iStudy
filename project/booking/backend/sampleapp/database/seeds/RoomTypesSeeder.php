<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypes = [
            ['name' => 'Standard Room', 'description' => 'Basic room with essential amenities.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Deluxe Room', 'description' => 'Upgraded room with additional amenities.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Suite Room', 'description' => 'Luxurious room with a separate living area.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Family Room', 'description' => 'Spacious room designed for families.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Executive Room', 'description' => 'Room with premium services for business travelers.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penthouse', 'description' => 'Top-floor room with spectacular views.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Economy Room', 'description' => 'Budget-friendly room with essential features.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ocean View Room', 'description' => 'Room with a view of the ocean.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Honeymoon Suite', 'description' => 'Romantic suite for honeymooners.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessible Room', 'description' => 'Room designed for accessibility.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'VIP Suite', 'description' => 'Exclusive suite with personalized services.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Business Class Room', 'description' => 'Designed for the needs of business travelers.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Spa Retreat', 'description' => 'Room with spa facilities for a relaxing stay.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Garden View Room', 'description' => 'Overlooking a beautiful garden.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Art Lover\'s Room', 'description' => 'Room decorated with artwork for art enthusiasts.', 'created_at' => now(), 'updated_at' => now()],
        ];



        // Insert data into the room_types table
        DB::table('room_types')->insert($roomTypes);
    }
}
