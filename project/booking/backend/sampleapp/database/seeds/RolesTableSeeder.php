<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo vai trò Admin
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo vai trò Nhân viên đặt tour
        DB::table('roles')->insert([
            'name' => 'Booking Staff',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo vai trò Khách hàng
        DB::table('roles')->insert([
            'name' => 'Customer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo vai trò Quản lý nội dung
        DB::table('roles')->insert([
            'name' => 'Content Manager',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo vai trò Người duyệt tin
        DB::table('roles')->insert([
            'name' => 'Moderator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo vai trò Người quản lý hệ thống
        DB::table('roles')->insert([
            'name' => 'System Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

