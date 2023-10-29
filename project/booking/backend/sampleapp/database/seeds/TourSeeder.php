<?php

use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tours = [
            [
                'category_id' => '2',
                'title' => 'City Exploration',
                'city' => 'Cityville',
                'address' => 'Downtown Cityville',
                'latitude' => 34.0522,
                'longitude' => -118.2437,
                'distance' => 10.5,
                'price' => 49.99,
                'max_group_size' => 15,
                'description' => 'Discover the vibrant city life of Cityville with our guided urban sightseeing tour.',
                'featured' => true,
            ],
            [
                'category_id' => '1',
                'title' => 'Culinary Delights',
                'city' => 'Foodtown',
                'address' => 'Food Street, Foodtown',
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'distance' => 8.2,
                'price' => 39.99,
                'max_group_size' => 12,
                'description' => 'Indulge in the rich and diverse culinary scene of Foodtown on our local food tour.',
                'featured' => true,
            ],
            [
                'category_id' => '3',
                'title' => 'Mountain Expedition',
                'city' => 'Adventureland',
                'address' => 'Base Camp, Adventureland',
                'latitude' => 36.7783,
                'longitude' => -119.4179,
                'distance' => 25.0,
                'price' => 79.99,
                'max_group_size' => 8,
                'description' => 'Embark on an thrilling adventure with our guided mountain expedition in Adventureland.',
                'featured' => false,
            ],
        ];

        // Loop through each tour and create a record in the database
        foreach ($tours as $tourData) {
            Tour::create($tourData);
        }
    }
}
