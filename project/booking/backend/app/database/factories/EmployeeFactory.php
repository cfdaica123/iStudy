<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->unique()->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'birthday' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
            'position' => $this->faker->jobTitle,
            'hire_date' => $this->faker->date,
            'salary' => $this->faker->randomFloat(2, 2000, 10000),
        ];
    }
}
