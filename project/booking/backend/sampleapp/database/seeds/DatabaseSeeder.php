<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserStatusesTableSeeder::class);
        $this->call(CreatePermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(AccountForAdministrators::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(BookingStatusesTableSeeder::class);
        $this->call(RoomTypesSeeder::class);
    }
}