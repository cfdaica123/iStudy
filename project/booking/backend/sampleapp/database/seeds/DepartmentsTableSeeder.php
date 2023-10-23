<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'Sales', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Customer Support', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Content Management', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Moderator', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'System Administration', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
