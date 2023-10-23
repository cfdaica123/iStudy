<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Admin
        $adminUserId = 1;
        $adminDepartmentId = $faker->numberBetween(1, 6);

        DB::table('employees')->insert([
            'full_name' => $faker->name,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'gender' => $faker->randomElement(['Male', 'Female']),
            'user_id' => $adminUserId,
            'department_id' => $adminDepartmentId,
            'position' => $faker->jobTitle,
            'hire_date' => $faker->dateTimeThisDecade->format('Y-m-d'),
            'salary' => $faker->randomFloat(2, 30000, 90000),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // System Administrator
        $sysAdminUserId = 2;
        $sysAdminDepartmentId = $faker->numberBetween(1, 6);

        DB::table('employees')->insert([
            'full_name' => $faker->name,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'gender' => $faker->randomElement(['Male', 'Female']),
            'user_id' => $sysAdminUserId,
            'department_id' => $sysAdminDepartmentId,
            'position' => $faker->jobTitle,
            'hire_date' => $faker->dateTimeThisDecade->format('Y-m-d'),
            'salary' => $faker->randomFloat(2, 30000, 90000),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
