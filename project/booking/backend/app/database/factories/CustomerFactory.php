<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'full_name' => $this->faker->unique()->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'image' => $this->faker->imageUrl(),
            'birthday' => $this->faker->dateTimeBetween('-30 years', 'now'),
        ];
    }
}
