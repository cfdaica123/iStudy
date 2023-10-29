<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Hotels and Resorts',
            'Urban Sightseeing Tour',
            'Local Food Tour',
            'Suburban Adventure Tour',
            'Adventure Tour',
            'Provision of Rooms and Accommodation',
            'Local Trade Services',
            'History and Culture Tour',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
