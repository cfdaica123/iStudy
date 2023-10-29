<?php

// HotelSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = [
            ['name' => 'Luxury Hotel', 'city' => 'New York', 'address' => '123 Broadway'],
            ['name' => 'Seaside Resort', 'city' => 'Miami', 'address' => '456 Ocean Drive'],
            ['name' => 'Mountain Lodge', 'city' => 'Aspen', 'address' => '789 Mountain View'],
            // Add more hotels as needed
        ];

        // Adding created_at and updated_at fields
        foreach ($hotels as &$hotel) {
            $hotel += ['created_at' => now(), 'updated_at' => now()];
        }

        DB::table('hotels')->insert($hotels);
    }
}

