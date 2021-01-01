<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'    => $this->faker->e164PhoneNumber,
            'reg_no'   => $this->faker->numberBetween($min = 1000, $max = 9000),
            'designation' => 'Prof',
            'department' => 'Medicine',
            'gender' => 'Male',
            'degree' => 'MBBS'

        ];
    }
}
