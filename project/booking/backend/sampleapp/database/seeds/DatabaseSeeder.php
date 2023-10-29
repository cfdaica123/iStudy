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
        $this->call(CreateAccount::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(BookingStatusesTableSeeder::class);
        $this->call(RoomTypesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(TourSeeder::class);



        // $this->call(RoomCategoriesSeeder::class);
    }
}
