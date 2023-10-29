<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAccount extends Seeder
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
            'user_status_id' => 1,
            'role_id' => 1, // Giá trị cho role_id của Admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản cho System Administrator
        $sysAdminUserId = DB::table('users')->insertGetId([
            'username' => 'sysadmin',
            'email' => 'sysadmin@example.com',
            'password' => Hash::make('123456'),
            'user_status_id' => 1,
            'role_id' => 6, // Giá trị cho role_id của System Administrator
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản cho Customer 1
        $customer1UserId = DB::table('users')->insertGetId([
            'username' => 'customer1',
            'email' => 'customer1@example.com',
            'password' => Hash::make('123456'),
            'user_status_id' => 1,
            'role_id' => 3, // Giá trị cho role_id của Customer
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo tài khoản cho Customer 2
        $customer2UserId = DB::table('users')->insertGetId([
            'username' => 'customer2',
            'email' => 'customer2@example.com',
            'password' => Hash::make('123456'),
            'user_status_id' => 1,
            'role_id' => 3, // Giá trị cho role_id của Customer
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
