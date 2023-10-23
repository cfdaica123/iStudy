<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountForAdministrators extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo tài khoản cho Admin
        $adminUserId = DB::table('users')->insertGetId([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'user_status_id' => 1, // Thay thế bằng giá trị thích hợp
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Liên kết Admin với vai trò Admin
        DB::table('user_roles')->insert([
            'user_id' => $adminUserId,
            'role_id' => 1, // Role ID cho Admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản cho System Administrator
        $sysAdminUserId = DB::table('users')->insertGetId([
            'username' => 'sysadmin',
            'email' => 'sysadmin@example.com',
            'password' => Hash::make('123456'),
            'user_status_id' => 1, // Thay thế bằng giá trị thích hợp
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Liên kết System Administrator với vai trò System Administrator
        DB::table('user_roles')->insert([
            'user_id' => $sysAdminUserId,
            'role_id' => 6, // Role ID cho System Administrator
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
