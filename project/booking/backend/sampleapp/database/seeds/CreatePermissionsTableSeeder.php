<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm dữ liệu mẫu cho bảng 'permissions'
        DB::table('permissions')->insert([
            ['name' => 'Create Tour', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Tour', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Tour', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View Tours', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Book Tour', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancel Booking', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View Bookings', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manage Users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manage Roles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manage Permissions', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
