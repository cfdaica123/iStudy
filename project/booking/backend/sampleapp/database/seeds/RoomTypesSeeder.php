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
            ['name' => 'Standard Room', 'description' => 'Basic room with essential amenities.'],
            ['name' => 'Deluxe Room', 'description' => 'Upgraded room with additional amenities.'],
            ['name' => 'Suite Room', 'description' => 'Luxurious room with a separate living area.'],
            ['name' => 'Family Room', 'description' => 'Spacious room designed for families.'],
            ['name' => 'Executive Room', 'description' => 'Room with premium services for business travelers.'],
            ['name' => 'Penthouse', 'description' => 'Top-floor room with spectacular views.'],
        ];

        // Insert data into the room_types table
        DB::table('room_types')->insert($roomTypes);
    }
}

