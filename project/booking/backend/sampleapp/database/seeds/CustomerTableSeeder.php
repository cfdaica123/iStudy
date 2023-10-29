<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Customer 1
        DB::table('customers')->insert([
            'user_id' => 3, // Thay thế bằng user_id tương ứng với khách hàng
            'full_name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'gender' => $faker->randomElement(['Male', 'Female']),
            'image' => null, // Có thể thay thế bằng đường dẫn hình ảnh thực tế
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Customer 2
        DB::table('customers')->insert([
            'user_id' => 4, // Thay thế bằng user_id tương ứng với khách hàng
            'full_name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'gender' => $faker->randomElement(['Male', 'Female']),
            'image' => null, // Có thể thay thế bằng đường dẫn hình ảnh thực tế
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm các khách hàng khác nếu cần
    }
}
