<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookingStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_statuses')->insert([
            ['name' => 'Booked', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Completed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
